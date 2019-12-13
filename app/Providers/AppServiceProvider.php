<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
  /**
  * Register any application services.
  *
  * @return void
  */
  public function register()
  {
    Schema::defaultStringLength(191);
  }

  /**
  * Bootstrap any application services.
  *
  * @return void
  */
  public function boot()
  {
    view()->composer('layouts.master-admin', function($view)
    {
      $empresa = Empresa::Where('id', '=', Auth::user()->empresa_id)->first();
      if (Auth::check()) {
        $view->with('empresa', $empresa);
      }else {
        $view->with('currentUser', null);
      }
    });
  }
}
