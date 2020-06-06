<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Session;

class User extends Authenticatable
{
    use Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'terms', 'two_factor_code', 'two_factor_expires_at', 'user_type', 'phone_number', 'gender', 'profile_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $dates = [
        'two_factor_expires_at', 
        'created_at', 
        'updated_at',
    ];


    // log attributes
    protected static $logAttributes = ['name', 'email'];

    // protected static $logOnlyDirty = true;



    public function generateTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = rand(1000, 9999);
        // $this->two_factor_code = 9999;
        $this->two_factor_expires_at = now()->addMinutes(125);
        // $this->two_factor_expires_at = null;
        $this->save();
    }

    public function resetTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

    public function twoFactorAndSendText(User $user)
    {
        try 
        {
            $this->generateTwoFactorCode();
            \Nexmo::message()->send([
                'to'   => '966'.$user->phone_number,
                // 'to'   => $user->phone_number,
                'from' => '923055644665',
                'text' => 'Thokhor verification Key is: '.$user->two_factor_code
            ]);
        } catch (\Exception $e) 
        {
            \Auth::logout();

            $status = array('msg' => "2F Auth Expired. You can not login at this time due to some technical issues. Consult Admin for further inquiries.", 'toastr' => "errorToastr");
            Session::put('error', $e->getMessage());
            return redirect('/en/login');
        }
    }





    // functions
    public function user_questionnaires() {
        return $this->hasMany('App\Questionnaire', 'fk_user_id', 'id');
    }

    public function user_latest_questionnaire() {
        return $this->user_questionnaires()
                ->orderBy('questionnaire_id', 'DESC')
                ->first();
    }
}
