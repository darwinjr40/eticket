<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\rol;
use App\Models\rolPermiso;
use App\Models\permiso;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class Permisos
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {

            $roles = rolPermiso::with('permissions')->get();
            $permissionsArray = [];

            foreach ($roles as $rol) {
                $permissionsArray[$rol->permissions->name][] = $rol->rol_id;
            }
            $rol = User::where('rol_id',$user->rol_id)->pluck('rol_id');
            foreach ($permissionsArray as $title => $roles) {
                //dd( $title);
                Gate::define($title, function (User $user) use ($rol, $roles) {
                    return $user->rol_id===$roles[0];
                });
            }

        }

        return $next($request);
    }
}
