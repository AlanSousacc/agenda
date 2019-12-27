<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Empresa;
use App\Models\Contato;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
  public function register()
  {
    Schema::defaultStringLength(191);
  }

  public function boot()
  {

    view()->composer('layouts.master-admin', function($view)
    {
      $empresa = Empresa::Where('id', '=', Auth::user()->empresa_id)->first();
      if (Auth::check()) {
        $contato = Contato::Where('empresa_id', '=', Auth::user()->empresa_id)->get();
        // dd($contato);
        $view->with('empresa', $empresa);
        $view->with('contato', $contato);
      }else {
        $view->with('currentUser', null);
      }
    });
  }
}
