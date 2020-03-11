<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public $loggedInUser;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->loggedInUser = auth()->user();
            return $next($request);
        });
    }


    public function permission_denied($route = 'home')
    {
    	$status = array('msg' => "Permission Denied: You don't have permission to perform this action.", 'toastr' => "warningToastr");
    	\Session::flash($status['toastr'], $status['msg']);
        return redirect()->route($route, app()->getLocale());
    }
}
