<?php

namespace App\Http\Controllers;

use App\SiteManagement;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Session;

class SiteManagementController extends Controller
{
    public $site_management;


    public function __construct()
    {
        parent::__construct();
        $this->site_management = new SiteManagement();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(loggedInUserRole() instanceof Role && loggedInUserRole()->hasPermissionTo('site_management_view'));
        if(!(loggedInUserRole() instanceof Role && loggedInUserRole()->hasPermissionTo('site_management_view')))
            return $this->permission_denied('home');

        $site_managements = [];
        foreach (SiteManagement::all() as $value) {
            $site_managements[$value->meta_key] = $value->meta_value;
        }

        $role = \DB::table('roles')->where('name', 'moderator')->first();
        $permissions = \DB::table('permissions')->get();
        $permission_role = \DB::table('role_has_permissions')
            ->where('role_id', $role->id)
            ->select(\DB::raw('CONCAT(permission_id,"-",role_id) AS detail'))
            ->pluck('detail')->all();

        return view('dashboard.control_panel.site_management.index')
                ->with(['title' => __('lang.site_management.site_management')])
                ->with('site_managements', $site_managements)
                ->with([
                    'role' => $role,
                    'permissions' => $permissions,
                    'permission_role' => $permission_role,
                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale='en', $option = '')
    {
        if(!(loggedInUserRole() instanceof Role && loggedInUserRole()->hasPermissionTo('site_management_add')))
            return $this->permission_denied('home');
        
        // dd($option, $request->all());
        switch ($option) {
            case 'general':
                $this->site_management->update_general_settings($request->except('_token'));

                // ------------------------ logo ----------------------
                $logo = $this->site_management->getGeneralLogo();
                // --------------- if logo already exists
                if ($logo) {
                    $destinationFilePath = 'backend_assets/site_assets/images/logo/'; 
                    $file_logo_name = null; 
                    $path_logo_filename = 'backend_assets/site_assets/images/logo/logo.png';
                    if ($request->hasFile('logo')) {
                        $file = $request->file('logo');
                        $destinationFilePath = 'backend_assets/site_assets/images/logo/';
                        $f_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        $f_extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                        $formatfilename = preg_replace('/[^\w]+/', '_', $f_name);
                        $file_logo_name = date('Ymd_hisa').'_'.$formatfilename.'.'.$f_extension;
                        $uploadSuccess = $file->move($destinationFilePath, $file_logo_name);
                        $path_logo_filename = 'backend_assets/site_assets/images/logo/'.$file_logo_name;
                    }
                    $logo->meta_value = ($file_logo_name != null) ? $path_logo_filename : $logo->meta_value;
                    $logo->save();
                } else {
                    // ---------------------- logo not exists
                    $destinationFilePath = 'backend_assets/site_assets/images/logo/'; 
                    $file_logo_name = ''; 
                    $path_logo_filename = 'backend_assets/site_assets/images/logo/logo.png';
                    if ($request->hasFile('logo')) {
                        $file = $request->file('logo');
                        $destinationFilePath = 'backend_assets/site_assets/images/logo/';
                        $f_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        $f_extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                        $formatfilename = preg_replace('/[^\w]+/', '_', $f_name);
                        $file_logo_name = date('Ymd_hisa').'_'.$formatfilename.'.'.$f_extension;
                        $uploadSuccess = $file->move($destinationFilePath, $file_logo_name);
                        $path_logo_filename = 'backend_assets/site_assets/images/logo/'.$file_logo_name;
                    }
                    $general = new SiteManagement();
                    $general->meta_key = 'logo';
                    $general->meta_value = $path_logo_filename;
                    $general->save();
                }

                // -------------------------- favicon
                $favicon = $this->site_management->getGeneralFavicon();
                if ($favicon) {
                    $destinationFilePath = 'backend_assets/site_assets/images/favicon/'; 
                    $file_favicon_name = null; 
                    $path_favicon_filename = 'backend_assets/site_assets/images/favicon/althraa_favicon.png';
                    if ($request->hasFile('favicon')) {
                        $file = $request->file('favicon');
                        $destinationFilePath = 'backend_assets/site_assets/images/favicon/';
                        $f_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        $f_extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                        $formatfilename = preg_replace('/[^\w]+/', '_', $f_name);
                        $file_favicon_name = date('Ymd_hisa').'_'.$formatfilename.'.'.$f_extension;
                        $uploadSuccess = $file->move($destinationFilePath, $file_favicon_name);
                        $path_favicon_filename = 'backend_assets/site_assets/images/favicon/'.$file_favicon_name;
                    }
                    $favicon->meta_value = ($file_favicon_name != null) ? $path_favicon_filename : $favicon->meta_value;
                    $favicon->save();
                } else {
                    $destinationFilePath = 'backend_assets/site_assets/images/favicon/'; 
                    $file_favicon_name = ''; 
                    $path_favicon_filename = 'backend_assets/site_assets/images/favicon/althraa_favicon.png';
                    if ($request->hasFile('favicon')) {
                        $file = $request->file('favicon');
                        $destinationFilePath = 'backend_assets/site_assets/images/favicon/';
                        $f_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        $f_extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                        $formatfilename = preg_replace('/[^\w]+/', '_', $f_name);
                        $file_favicon_name = date('Ymd_hisa').'_'.$formatfilename.'.'.$f_extension;
                        $uploadSuccess = $file->move($destinationFilePath, $file_favicon_name);
                        $path_favicon_filename = 'backend_assets/site_assets/images/favicon/'.$file_favicon_name;
                    }
                    $general = new SiteManagement();
                    $general->meta_key = 'favicon';
                    $general->meta_value = $path_favicon_filename;
                    $general->save();
                }
                $status = array('msg' => "General Settings saved", 'toastr' => "successToastr");
                break;

            case 'maintenance': 
                $this->site_management->update_maintenance_settings($request->except('_token'));

                $maintenance_image = $this->site_management->getMaintenanceImage();
                if ($maintenance_image) {
                    $destinationFilePath = 'backend_assets/site_assets/images/maintenance/'; 
                    $file_image_name = null; 
                    $path_image_filename = 'backend_assets/site_assets/images/maintenance/maintenance.png';
                    if ($request->hasFile('maintenance_image')) {
                        $file = $request->file('maintenance_image');
                        $destinationFilePath = 'backend_assets/site_assets/images/maintenance/';
                        $f_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        $f_extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                        $formatfilename = preg_replace('/[^\w]+/', '_', $f_name);
                        $file_image_name = date('Ymd_hisa').'_'.$formatfilename.'.'.$f_extension;
                        $uploadSuccess = $file->move($destinationFilePath, $file_image_name);
                        $path_image_filename = 'backend_assets/site_assets/images/maintenance/'.$file_image_name;
                    }
                    $maintenance_image->meta_value = ($file_image_name != null) ? $path_image_filename : $maintenance_image->meta_value;
                    $maintenance_image->save();
                } else {
                    $destinationFilePath = 'backend_assets/site_assets/images/maintenance/'; 
                    $file_image_name = ''; 
                    $path_image_filename = 'backend_assets/site_assets/images/maintenance/maintenance.png';
                    if ($request->hasFile('maintenance_image')) {
                        $file = $request->file('maintenance_image');
                        $destinationFilePath = 'backend_assets/site_assets/images/maintenance/';
                        $f_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        $f_extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                        $formatfilename = preg_replace('/[^\w]+/', '_', $f_name);
                        $file_image_name = date('Ymd_hisa').'_'.$formatfilename.'.'.$f_extension;
                        $uploadSuccess = $file->move($destinationFilePath, $file_image_name);
                        $path_image_filename = 'backend_assets/site_assets/images/maintenance/'.$file_image_name;
                    }
                    $maintenance = new SiteManagement();
                    $maintenance->meta_key = 'maintenance_image';
                    $maintenance->meta_value = $path_image_filename;
                    $maintenance->save();
                }

                $status = array('msg' => "Settings saved for Maintenance Mode", 'toastr' => "successToastr");
                break;
            
            default:
                $status = array('msg' => "Invalid Selection for Settings", 'toastr' => "errorToastr");
                break;
        }

        Session::flash($status['toastr'], $status['msg']);
        return redirect()->route('site_management', app()->getLocale());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SiteManagement  $siteManagement
     * @return \Illuminate\Http\Response
     */
    public function show(SiteManagement $siteManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SiteManagement  $siteManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteManagement $siteManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SiteManagement  $siteManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteManagement $siteManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SiteManagement  $siteManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteManagement $siteManagement)
    {
        //
    }


    public function permission_role(Request $request)
    {
        if(!(loggedInUserRole() instanceof Role && loggedInUserRole()->hasPermissionTo('role_permission_add')))
            return $this->permission_denied('home');
        
        $insert = [];
        $permissions_roles = $request->input('permission_role') ?? [];
        foreach($permissions_roles as $perm => $roles)
            $insert[] = $perm;
        $role = Role::where('name', 'moderator')->firstorFail();
        $role->syncPermissions($insert);

        $status = array('msg' => "Permissions assigned to role Moderator", 'toastr' => "successToastr");
        Session::flash($status['toastr'], $status['msg']);
        return redirect()->route('site_management', app()->getLocale());
    }
}
