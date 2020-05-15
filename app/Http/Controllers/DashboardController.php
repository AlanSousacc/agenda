<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Movimento;
use App\Models\Empresa;
use App\Models\Event;

class DashboardController extends Controller
{
	public function index(){
		$empresas 		= Empresa::all();
		$movimentos 	= Movimento::all();
		$agendamentos = Event::all();
		dd($agendamentos);
	}
}
