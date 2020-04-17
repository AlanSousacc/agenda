<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use App\Models\Contato;
use App\Models\Event;
use App\Models\Empresa;
use Auth;
use Mail;
use Carbon;

class EmailController extends Controller
{
	public function sendEmail($contato, $id){
		$contato = Contato::where('id', $contato)->where('empresa_id', Auth::user()->empresa_id)->first();
		$empresa = Empresa::where('id', Auth::user()->empresa_id)->first();
		$event   = Event::where('contato_id', $contato->id)->whereRaw('date(start) = CURDATE()')->where('empresa_id', '=', Auth::user()->empresa_id)->first();

		$data['title'] 		= "Hoje você tem um agendamento";
		$data['empresa'] 	= $empresa->nomefantasia;
		$data['telemp'] 	= $empresa->telefone;
		$data['emailemp'] = $empresa->email;
		$data['contato'] 	= $contato->nome;
		$to_email 				= $contato->email;
		$to_name 					= $data['contato'];
		$data['hi'] 			= Carbon\Carbon::parse($event['start'])->format('H:i:s');
		$data['hf'] 			= Carbon\Carbon::parse($event['end'])->format('H:i:s');

		if($to_email == null)
			return redirect('saladeespera')->with('error', 'Contato sem e-mail cadastrado!');		

		Mail::send('Admin.emails.notificar-contato', $data, function($message) use ($to_name, $to_email) {
			$message->to($to_email, $to_name)
			->subject('Seu agendamento, hoje!');
		});
		
		if (Mail::failures()) {
			return redirect('saladeespera')->with('error', 'Falha eo enviar email para este contato!');
		}else{
			return redirect('saladeespera')->with('success', 'Email enviado com sucesso!');
		}
	}
}
