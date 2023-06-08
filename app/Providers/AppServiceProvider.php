<?php

namespace App\Providers;
use App\Models\ejercicio;
use App\Models\rutina;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $ejercicios = Ejercicio::all();
        view()->share('ejercicios', $ejercicios);

        $rutinas = rutina::all();
        view()->share('rutinas', $rutinas);

        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'usuario']);
        // Role::create(['name' => 'coach']);
    }
}
