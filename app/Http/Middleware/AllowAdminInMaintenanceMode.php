<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AllowAdminInMaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(maintenanceMode()){

            if(loggedInUser() && loggedInUser()->hasRole('admin')){
                return $next($request);
            }
            else
            {
                $title = trans('lang.maintenance_mode');
                // $maintenance_mode_settings = maintenanceSettings();
                $maintenance_mode_heading = maintenancePageHeading();
                $maintenance_mode_description = maintenancePageDescription();
                $maintenance_mode_image = maintenancePageImage();
                return response()
                        ->view('frontend.pages.maintenance', compact(
                            'maintenance_mode_heading',
                            'maintenance_mode_description',
                            'maintenance_mode_image',
                            'title'
                        ));
            }

        }


        return $next($request);
    }
}
