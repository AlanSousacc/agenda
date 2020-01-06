<?php

namespace App\Http\Controllers;
use Exception;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  public function index(Request $request){
		$user 		= Auth::user()->empresa_id;
    $consulta = User::where('empresa_id', '=', $user)->paginate(10);

    return view('Admin.users.list', compact('consulta', 'dataForm'));
  }

  public function search(Request $request, User $user){
    $dataForm = $request->except('_token');

    $consulta = $user->search($dataForm);
    return view('Admin.users.list', compact('consulta', 'dataForm'));
  }

  public function myAccount(){
    $user = Auth::user();
    return view('Admin.users.myAccount', compact('user'));
  }

  public function update(Request $request){
    $data = $request->all();
    // aqui faz todas as valições possiveis
    try{
      $usuario = User::find($data['user_id']);
      if (!$usuario)
      throw new Exception("Nenhum usuário encontrado");

      // aqui então faz todo o tratamento e seta o que foi alterado;
      $usuario->name           = $data['name'];
      $usuario->password       = bcrypt($data['password']);
      $usuario->profile        = $data['profile'];
      $usuario->email          = $data['email'];

    } catch (Exception $e) {
      return redirect('list-user')->with('error', $e->getMessage());
      exit();
    }

    // aqui inicia a gravação no bd
    try{
      DB::beginTransaction();

      $saved = $usuario->save();
      if (!$saved){
        throw new Exception('Falha ao salvar usuário!');
      }
      DB::commit();
      // se chegou aqui é pq deu tudo certo
      return redirect('list-user')->with('success', 'Usuário #' . $usuario->id . ' alterado com sucesso.');
    } catch (Exception $e) {
      // se deu pau ao salvar no banco de dados, faz rollback de tudo e retorna erro
      DB::rollBack();
      return redirect('list-user')->with('error', $e->getMessage());
    }

  }

  public function updateMyAccount(User $user){

    if(Auth::user()->email == request('email')) {
      $this->validate(request(), [
        'name' 			=> 'required',
        'password' 	=> 'required|min:6|confirmed'
        ]);
        $user->name = request('name');
        $user->password = bcrypt(request('password'));

        $user->save();
        $saved = $user->save();
        if (!$saved){
          return redirect('my-account')->with('error', $e->getMessage());
        } else {
          return redirect('my-account')->with('success', 'Seu usuário foi alterado com sucesso!');
        }

      } else {
        $this->validate(request(), [
          'name' 			=> 'required',
          'email' 		=> 'required|email|unique:users',
          'password' 	=> 'required|min:6|confirmed'
          ]);
          $user->name 		= request('name');
          $user->email 		= request('email');
          $user->password = bcrypt(request('password'));

          $user->save();
          $saved = $user->save();
          if (!$saved){
            return redirect('my-account')->with('error', $e->getMessage());
          } else {
            return redirect('my-account')->with('success', 'Seu usuário foi alterado com sucesso!');
          }
        }
      }

      public function destroy(Request $request){
        try{
          $usuario = User::find($request->user_id);

          if (!$usuario)
          throw new Exception("Nenhum usuário encontrado");

          if(Auth::user()->profile != 'Administrador')
          throw new Exception("Este usuário não tem permissão para remover outros usuários!");

        } catch (Exception $e) {
          return redirect('list-user')->with('error', $e->getMessage());
          exit();
        }

        // aqui inicia a gravação no bd
        try{
          DB::beginTransaction();

          $saved = $usuario->delete();
          if (!$saved){
            throw new Exception('Falha ao remover usuário!');
          }
          DB::commit();
          // se chegou aqui é pq deu tudo certo
          return redirect('list-user')->with('success', 'Usuário #' . $usuario->id . ' removido com sucesso!');
        } catch (Exception $e) {
          // se deu pau ao salvar no banco de dados, faz rollback de tudo e retorna erro
          DB::rollBack();

          return redirect('list-user')->with('error', $e->getMessage());
        }
      }
    }
