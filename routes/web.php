<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Clear Cache
|--------------------------------------------------------------------------
|
*/
Route::get('/clear', function(){
  Artisan::call('cache:clear');
  // Artisan::call('route:cache');
  Artisan::call('view:clear');
  Artisan::call('config:cache');
  return "Done! Go Back and Refresh Page Please";
})->name('clear');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/login_with_another_account', function() {
    auth()->logout();
    return redirect()->back();
})->name('login_with_another_account');

// maintenance mode ON
// Route::get('/maintenance-mode', function(){
//   Artisan::call('down');
//   return "Done! Your Application is in Maintenance Mode now. Go Back and Refresh Page please.";
// })->name('maintenance-mode');




/*
|--------------------------------------------------------------------------
| Social Login
|--------------------------------------------------------------------------
|
*/
// Google login
Route::get('/redirect', 'Auth\LoginController@redirectToProvider')->name('redirect');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback')->name('callback');


// By Default Set Locale
Route::get('/', function () {
    return redirect(app()->getLocale() ?? 'ar');
})->name('/');

/*
|--------------------------------------------------------------------------
| All Routes LOCALE Middleware
|--------------------------------------------------------------------------
|
*/
// Put everything in the group route due to Locale
Route::group([
  'prefix' => '{locale}', 
  'where' => ['locale' => '[a-zA-Z]{2}'],
  'middleware' => 'setlocale',
], function() {



  Route::get('download-report', 'ReportController@downloadReport')->name('download');
  Route::post('validate-phone', 'HomeController@phoneVerification')->name('validate_phone');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
*/
  Auth::routes();
  Route::post('/authenticate', 'Auth\LoginController@authenticate')->name('authenticate');
/*
|--------------------------------------------------------------------------
| Two Factor Verification Routes
|--------------------------------------------------------------------------
|
*/
  // Two Factor
  Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');
  Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);

/*
|--------------------------------------------------------------------------
| Maintenance Mode Middleware
|--------------------------------------------------------------------------
|
*/
  Route::group(['middleware' => 'allow_admin_in_maintenance_mode'], function() {

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
*/
  //Frontend routes start
  	Route::get('/', function () {
        return view('frontend.index');
    })->name('/');

    Route::get('/legal',  function () {
        return view('frontend.pages.legal');
    })->name('legal');
    

    Route::get('/contact',  function () {
        return view('frontend.pages.contact');
    })->name('contact');
    

    Route::get('/about',  function () {
        return view('frontend.pages.about');
    })->name('about');
   
   
    Route::get('/disclaimer',  function () {
        return view('frontend.pages.disclaimer');
    })->name('disclaimer');
   
   
    // Route::get('/pricing',  function () {
    //     return view('frontend.pages.pricing');
    // })->name('pricing');
    

    // Route::get('/help',  function () {
    //     return view('frontend.pages.help');
    // })->name('help');
    

    // Route::get('/careers',  function () {
    //     return view('frontend.pages.careers');
    // })->name('careers');
    

    Route::get('/get-started', 'HomeController@getStarted')->name('get-started');
    
//Frontend routes end   

/*
|--------------------------------------------------------------------------
| Auth ONLY AFTER LOGIN Routes
|--------------------------------------------------------------------------
|
*/

    Route::group([
      'middleware' => [
        'auth', 
        'twofactor', 
        'prevent_back_after_logout', 
      ],
    ], function() {


      /*
      |--------------------------------------------------------------------------
      | Admin Panel Routes
      |--------------------------------------------------------------------------
      |
      */
      // testing
      Route::get('/admin',  function () {
          return view('dashboard.control_panel.index');
      })->name('admin');

      Route::get('/home', 'HomeController@index')->name('home');

      Route::get('/email-verification', 'HomeController@emailVerification')->name('email_verification');
      Route::post('/email-verification', 'QuestionnaireController@getReport')->name('email_verification');

      Route::get('/payment', 'HomeController@payment')->name('payment');
      Route::post('/payment', 'HomeController@getPayment')->name('payment');
      // Route::post('/payment', 'QuestionnaireController@getReport')->name('payment');

      Route::get('/sample-report',  function () {
          return view('dashboard.pdf.sample_report');
      })->name('sample-report');

      // Route::get('/sample-report', 'HomeController@emailVerification')->name('email_verification');

      // --------------------------------- Site Management Routes ---------------------------
      Route::get('/site_management', 'SiteManagementController@index')->name('site_management');
      Route::post('/save_site_management/{option}', 'SiteManagementController@store')->name('save_site_management');
      Route::post('/permission_role', 'SiteManagementController@permission_role')->name('permission_role');


      // --------------------------------- User Routes -------------------------------
      Route::get('/user/{type?}', 'UserController@index')->name('user');
      Route::patch('/switch_role/{user}', 'UserController@switchRole')->name('switch_role');
      Route::delete('/remove/user/{user}', 'UserController@destroy')->name('remove-user');
      Route::post('search_user_by_name', 'UserController@search_user_by_name')->name('search_user_by_name');
      Route::get('user-report', 'ReportController@getUserReport')->name('report');

      Route::get('/add_user/moderator', 'UserController@create')->name('add_user/moderator');
      Route::post('/store_user/moderator', 'UserController@store')->name('store_user/moderator');

      Route::get('/user_profile', 'UserController@profile')->name('user_profile');
      Route::post('/update_user', 'UserController@update')->name('update_user');
      // filter
      Route::get('/search_user', 'UserController@filter')->name('search_user');

      // --------------------------------- Constant Routes -------------------------------
      Route::get('/constants', 'ConstantController@index')->name('constants');
      Route::get('/edit_constant/{constant?}', 'ConstantController@edit')->name('edit_constant');
      Route::put('/update_constant/{constant}', 'ConstantController@update')->name('update_constant');

      // --------------------------------- Activity Log Routes ------------------------------------
        Route::get('/logs', 'ActivityLogController@index')->name('logs');

      /*
      |--------------------------------------------------------------------------
      | Admin & User REPORTS Routes
      |--------------------------------------------------------------------------
      |
      */

        Route::get('/results/{user?}', 'QuestionnaireController@evaluateResult')->name('results');
        
        Route::get('/networth/{type}/{user?}', 'QuestionnaireController@networth')->name('networth');
      
        Route::get('/plan/{plan}/{user?}', 'QuestionnaireController@plan')->name('plan');

      /*
      |--------------------------------------------------------------------------
      | User Panel Routes
      |--------------------------------------------------------------------------
      |
      */
      //User dashboard routes start

      // ------------------------- Questionnaire Routes ------------------------------
      Route::get('/step_1', 'QuestionnaireController@create')->name('step_1');
      Route::get('/step_2', 'QuestionnaireController@step_2')->name('step_2');
      Route::get('/step_3', 'QuestionnaireController@step_3')->name('step_3');
      Route::get('/step_4', 'QuestionnaireController@step_4')->name('step_4');
      Route::get('/step_5', 'QuestionnaireController@step_5')->name('step_5');
      Route::get('/step_6', 'QuestionnaireController@step_6')->name('step_6');
      // Route::get('/step_7', 'QuestionnaireController@step_7')->name('step_7');
      // post
      Route::post('/questionnaire', 'QuestionnaireController@store')->name('questionnaire');

      Route::get('/current_state', 'QuestionnaireController@evaluateResult')->name('current_state');

      Route::get('/currentstate/{type}/{user?}', 'QuestionnaireController@networth')->name('currentstate');

      Route::get('/potential_state', 'QuestionnaireController@potential_state')->name('potential_state');

      // user panel
      Route::get('/saving_evaluation', 'QuestionnaireController@saving_evaluation')->name('saving_evaluation');

      Route::get('/networth_evaluation', 'QuestionnaireController@networth_evaluation')->name('networth_evaluation');

      Route::get('/networthevaluation/{type}', 'QuestionnaireController@networth')->name('networthevaluation');

      Route::get('/investment_evaluation_without_plan', 'QuestionnaireController@investment_evaluation_without_plan')->name('investment_evaluation_without_plan');

      Route::get('/select_plan/{user?}', 'QuestionnaireController@select_plan')->name('select_plan');

      // Route::get('/investment_evaluation_with_plan/{plan}', 'QuestionnaireController@investment_evaluation_with_plan')->name('investment_evaluation_with_plan');

      Route::get('/investment_evaluation_with_plan/{plan}', 'QuestionnaireController@new_investment_evaluation_with_plan')->name('investment_evaluation_with_plan');


      /*
      * _____________________ current_situation ______________________
      */
      Route::get('/current_situation', 'QuestionnaireController@current_situation')->name('current_situation');

      /*
      * ----------------
      * Withplan 
      * ----------------
      */
      Route::get('/investment_evaluation_with_a_plan', 'QuestionnaireController@with_plan')->name('investment_evaluation_with_a_plan');

      Route::get('/additional_information', 'QuestionnaireController@additional_information')->name('additional_information');

      Route::post('/additional_information', 'QuestionnaireController@store_additional_information')->name('additional_information.store');


      // ___________________________________ REPORTS __________________________
      Route::get('/plan_selection/{user?}', 'QuestionnaireController@select_plan_for_report')->name('plan_selection');

      Route::get('/pdf_report/{plan}/{user?}', 'QuestionnaireController@pdf_report')->name('pdf_report');


      // Route::get('/currentstate_assets',  function () {
      //     return view('dashboard.user_panel.user_dashboard_pages.currentstate_assets');
      // })->name('currentstate_assets');
      
      // Route::get('/currentstate_liabilities',  function () {
      //     return view('dashboard.user_panel.user_dashboard_pages.currentstate_liabilities');
      // })->name('currentstate_liabilities');
      
      // Route::get('/potential_state',  function () {
      //     return view('dashboard.user_panel.user_dashboard_pages.potential_state');
      // })->name('potential_state');
      
      Route::get('/partners',  function () {
          return view('dashboard.user_panel.user_dashboard_pages.partners');
      })->name('partners');


      // ------------------ PDF ---------------
      Route::get('/print_preview/{user?}', 'QuestionnaireController@print_preview')->name('print_preview');
      
    });


    // ----------------------------- Contact Email --------------------------------

    Route::post('/contact', 'HomeController@contactEmail')->name('contact');
  });

});