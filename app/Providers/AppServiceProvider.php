<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

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
        Paginator::useBootstrapFive();
    
        Validator::extend('valid_rut', function ($attribute, $value, $parameters, $validator) {
            // Verificar si el RUT es una secuencia de números repetitivos
            if (preg_match('/^(\d)\1+$/', $value)) {
                return false; // RUT no válido si es una secuencia repetitiva
            }
        
            $rut = $value; // El RUT ya viene sin formato.
            $dvUsuario = strtolower($parameters[0]); // El DV viene como primer parámetro adicional.
            $factor = 2;
            $suma = 0;
        
            for ($i = strlen($rut) - 1; $i >= 0; $i--) {
                $suma += $rut[$i] * $factor;
                $factor = $factor == 7 ? 2 : $factor + 1;
            }
        
            $resto = $suma % 11;
            $dvCalculado = 11 - $resto;
        
            if ($dvCalculado == 11) {
                $dvCalculado = '0';
            } elseif ($dvCalculado == 10) {
                $dvCalculado = 'k';
            } else {
                $dvCalculado = (string)$dvCalculado;
            }
        
            return $dvCalculado == $dvUsuario;
        }, 'El dígito verificador no es válido o el RUT es inválido.');
    }
}
