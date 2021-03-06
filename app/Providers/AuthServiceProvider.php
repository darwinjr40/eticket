<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
 
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        // Passport::tokensExpireIn(now()->addDays(1));
        // Passport::tokensExpireIn(now()->addHours(1)); //inspirara en 1 hora
        Passport::tokensExpireIn(now()->addSeconds(20)); //inspirara en 60 segundos
       /*  Gate::before(function ($user, $abililty){
            return $user->email =='admin@gmail.com' ?? null;
        }); */
    }
}
