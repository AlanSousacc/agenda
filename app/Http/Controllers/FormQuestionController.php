<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioRequest;
use Illuminate\Http\Request;
use App\Models\Formulario;
use App\Models\FormQuestions;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Auth;
use Exception;
use App\User;
use \PDF;

class FormQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			try{
				$question = new FormQuestions;
	
				$question->question       = $request['question'];
				// $question->status         = $request['status'];
				$question->formulario_id  = $request['formulario_id'];
	
			} catch (Exception $e) {
				return redirect()->route('form.list')->with('error', $e->getMessage());
				exit();
			}
	
			try{
				DB::beginTransaction();
	
				$saved = $question->save();
				if (!$saved){
					throw new Exception('Falha ao salvar Pergunta!');
				}
				DB::commit();
				return redirect()->route('form.list')->with('success', 'Pergunta cadastrada com sucesso!');
	
			} catch (Exception $e) {
				DB::rollBack();
				return redirect()->route('form.list')->with('error', $e->getMessage());
			}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
