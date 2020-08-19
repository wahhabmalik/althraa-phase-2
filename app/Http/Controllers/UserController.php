<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale = 'en', $type = 'general')
    {
        if(!(loggedInUserRole() instanceof Role && loggedInUserRole()->hasPermissionTo('user_view')))
            return $this->permission_denied('home');
        
        $roles = Role::where('name', 'admin')
                        ->orWhere('name', 'moderator')
                        ->get();
        switch ($type) {
            case 'general':
                $users = User::role('user')->where('id', '<>', $this->loggedInUser->id)->get();
                // $users = User::role('user')->where('id', '<>', $this->loggedInUser->id)->paginate(1);
                // dd($users);
                return view('dashboard.control_panel.users.index')
                        ->with([
                            'title' => __('lang.users')
                        ])
                        ->with('users', $users)
                        ->with('roles', $roles);
                break;
            
            case 'staff':
                $users = User::role(['moderator', 'admin'])->where('id', '<>', $this->loggedInUser->id)->get();
                return view('dashboard.control_panel.staff.index')
                        ->with([
                            'title' => __('lang.staff')
                        ])
                        ->with('users', $users)
                        ->with('roles', $roles);
                break;
            
            default:
                $status = array('msg' => "No Role Found", 'toastr' => "errorToastr");
                Session::flash($status['toastr'], $status['msg']);
                return redirect()->route('home', app()->getLocale());
                break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.control_panel.staff.form')
                ->with([
                    'title' => __('lang.staff')
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale = 'en')
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            // 'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:255|unique:users',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // 'password' => Hash::make($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'user_type' => 'moderator',
        ]);

        if ($user) {
            $user->assignRole('moderator');
        }

        // $status = $user ? array('msg' => __('lang.staff.user_add_successfully'), 'toastr' => "successToastr") : array('msg' => "Some Error occured. Try again", 'toastr' => "errorToastr");
        // Session::flash($status['toastr'] ?? null, $status['msg']);
        return redirect()->route('user', [app()->getLocale(), 'staff']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale = 'en', ? User $user)
    {
        $user = $this->loggedInUser;
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'phone_number' => 'required|string|max:255|unique:users,phone_number,'.$user->id,
            'profile_image' => 'nullable|image|max:1000|mimes:jpeg,png,jpg',
        ]);

        $destinationFilePath = 'backend_assets/user_uploads/'; 
        $file_profile_name = null; 
        $path_profile_filename = 'backend_assets/user_uploads/default.png';
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $destinationFilePath = 'backend_assets/user_uploads/';
            $f_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $f_extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $formatfilename = preg_replace('/[^\w]+/', '_', $f_name);
            $file_profile_name = date('Ymd_hisa').'_'.$formatfilename.'.'.$f_extension;
            $uploadSuccess = $file->move($destinationFilePath, $file_profile_name);
            $path_profile_filename = 'backend_assets/user_uploads/'.$file_profile_name;
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->profile_image = ($file_profile_name != null) ? $path_profile_filename : $user->profile_image;
        $user->save();

        // $status = $user->save() ? array('msg' => "Profile updated successfully.", 'toastr' => "successToastr") : array('msg' => "Some Error occured. Try again", 'toastr' => "errorToastr");
        Session::flash($status['toastr'] ?? null, $status['msg']);
        return redirect()->route('user_profile', [app()->getLocale()]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale = 'en', User $user)
    {
        if (auth()->user()->hasRole('admin')) 
            $user->delete();
        // $status = array('msg' => "User removed successfully.", 'toastr' => "successToastr");
        // Session::flash($status['toastr'] ?? null, $status['msg']);
        return redirect()->back();
    }



    public function switchRole($locale = 'en', User $user)
    {
        if(!(loggedInUserRole() instanceof Role && loggedInUserRole()->hasPermissionTo('user_view')))
            return $this->permission_denied('home');
        
        // dd($user->getRoleNames());
        if ($user->hasRole('admin')) 
        {
            $user->removeRole('admin');
            $user->assignRole('moderator');
            // $status = array('msg' => "User has been assigned as Moderator", 'toastr' => "successToastr");
            // Session::flash($status['toastr'], $status['msg']);
            return redirect()->route('user', [app()->getLocale(), 'staff']);
        } 
        else if ($user->hasRole('moderator')) 
        {
            $user->removeRole('moderator');
            $user->assignRole('admin');
            // $status = array('msg' => "User has been assigned as Admin", 'toastr' => "successToastr");
            // Session::flash($status['toastr'], $status['msg']);
            return redirect()->route('user', [app()->getLocale(), 'staff']);
        }
        // $status = array('msg' => "No Role Found", 'toastr' => "errorToastr");
        // Session::flash($status['toastr'], $status['msg']);
        return redirect()->route('user', [app()->getLocale(), 'staff']);
    }

    // search user by name
    public function search_user_by_name(Request $request)
    {
        if ($request->ajax()) {
            $users = User::role('user')->where('id', '<>', $this->loggedInUser->id)
                            ->where('name', 'LIKE',  $request->input('search_user_by_name') . '%')
                            ->get();
            // return $users;
            $no_result = "
                <td colspan='8' class='text-center'> No User(s) found regarding your search. </td>
            ";
            $table_body = "<tr>";
                if(count($users) > 0){
                    foreach ($users as $user) {
                        $user_img = asset('backend_assets/dashboard/images/users/ali.png');
                        $table_body .= "
                            <td><img class='user_image' src='$user_img'></td>
                            <td><p class='text_black'>
                                $user->name
                            </p></td>
                            <td><p class='text_black'>
                                
                            </p></td>
                            <td><p class='text_black'>
                                $user->created_at
                            </p></td>
                            <td><p class='text_black'>
                                
                            </p></td>
                            <td><p class='text_black'>
                                 $user->email
                            </p></td>
                            <td><p class='text_black'>
                                ********
                            </p></td>
                            <td><p class='text_black'>
                                
                            </p></td>
                            <td><p class='text_black'>
                                
                            </p></td>
                        ";
                    }
                } else {
                    $table_body .= $no_result;
                }
            $table_body .= "</tr>";

            return $table_body;
        }
        return response()->json(array('msg'=> "Bad Request"), 400);
    }

    // profile
    public function profile()
    {
        // dd($this->loggedInUser);

            $user = $this->loggedInUser;
            $user_questionnaire = $user->user_latest_questionnaire();
            $href = null;
            $disabled = null;

            if ($user_questionnaire) 
            {
                $userdata = $user_questionnaire->getOriginal();
                $userdata = array_splice($userdata, 0, 10);
                
                $empty = in_array(null, $userdata);
                $null_column = array_search(null, $userdata);

                $columns = [
                    // 1 => 'started_year_for_personal_financial_plan',
                    1 => 'personal_info',
                    2 => 'income',
                    3 => 'expenses',
                    4 => 'net_assets',
                    5 => 'gosi',
                    6 => 'risks',
                    7 => 'objective',
                ];

                // dd(((array_search($null_column, $columns) - 1) / 8 ) * 100);
                $questionnaire_completed_percentage = 100;
                if ($null_column) {
                    $questionnaire_completed_percentage = (((array_search($null_column, $columns) - 1) / 7 ) * 100);
                }

                // dd($empty, $null_column, $columns, $questionnaire_completed_percentage);

                
                if ($user_questionnaire) 
                {
                    $empty = in_array(null, $userdata);
                    if ($empty) {
                        $href = 'javascript:void(0)';
                        $disabled = 'disabled';
                    }
                }
            }



        if($this->loggedInUser->hasAnyRole(['admin', 'moderator'])){
            return view('dashboard.control_panel.staff.profile')
                ->with(['title' => __('lang.user.profile')])
                ->with('user', $this->loggedInUser)
                ->with('href', $href)
                ->with('disabled', $disabled);
        }
        else if($this->loggedInUser->hasRole('user')){
            return view('dashboard.user_panel.user_dashboard_pages.profile')
            ->with(['title' => __('lang.user.profile')])
            ->with('user', $this->loggedInUser)
            ->with('href', $href)
            ->with('disabled', $disabled);
        }
        else{
            return "No Role Found";
        }
    }

    public function filter(Request $request)
    {
        $gender = $request->input('gender') ?? '';
        $name = $request->input('name') ?? '';
        $minimum_wealth = $request->input('minimum_wealth') ?? '';
        $maximum_wealth = $request->input('maximum_wealth') ?? '';
        
        // dd($gender, $name, $minimum_wealth, $maximum_wealth);
        $users = User::
                    when(!empty($gender), function ($query) use ($gender) {
                        return $query->where('gender', $gender);
                    })
                    ->when(!empty($name), function ($query) use ($name) {
                        // return $query->where('name', $name);
                        return $query->where('name', 'LIKE',  $name . '%');
                    })
                    ->role('user')->where('id', '<>', $this->loggedInUser->id)
                    ->get();
        if (!empty($minimum_wealth))
        {
            $users = $users->filter(function ($user) use ($minimum_wealth){
                if ($user->user_latest_questionnaire()) {
                        return $user->user_latest_questionnaire()->getNetIncome($user) >= (int) $minimum_wealth;
                    }
                return null;
            });
        }           
        if (!empty($maximum_wealth))
        {
            $users = $users->filter(function ($user) use ($maximum_wealth){
                if ($user->user_latest_questionnaire()) {
                    return $user->user_latest_questionnaire()->getNetIncome($user) <= (int) $maximum_wealth;
                }           
                return null;
            });
        }

        return view('dashboard.control_panel.users.index')
                ->with([
                    'title' => __('lang.users')
                ])
                ->with('users', $users)
                ->with([
                        'searched_gender' => $gender, 
                        'searched_name' => $name, 
                        'searched_min_wealth' => $minimum_wealth,
                        'searched_max_wealth' => $maximum_wealth,
                ]);                    
    }
}
