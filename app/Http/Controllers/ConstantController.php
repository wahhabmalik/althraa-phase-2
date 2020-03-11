<?php

namespace App\Http\Controllers;

use App\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class ConstantController extends Controller
{

    public function __construct() {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $constants = Constant::get();
        return view('dashboard.control_panel.constant.list')
                ->with([
                    'title' => __('lang.constants.constants'),
                    'page_title' => __('lang.constants.constants'),
                ])
                ->with('constants', $constants);
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
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Constant  $constant
     * @return \Illuminate\Http\Response
     */
    public function show(Constant $constant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Constant  $constant
     * @return \Illuminate\Http\Response
     */
    public function edit($locale = 'en', Constant $constant)
    {
        return view('dashboard.control_panel.constant.form')
                ->with([
                    'title' => __('lang.constants.constants'),
                    'page_title' => __('lang.constants.edit_constant'),
                ])
                ->with('constant', $constant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Constant  $constant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale = 'en', Constant $constant)
    {
        $request->validate([
            'constant_value' => 'required|integer',
        ]);

        $constant->constant_value = $request->constant_value;
        $constant->save();
        $status = array('msg' => "Constant Value updated successfully.", 'toastr' => "successToastr");
        Session::flash($status['toastr'], $status['msg']);
        return redirect()->route('constants', app()->getLocale());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Constant  $constant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Constant $constant)
    {
        //
    }
}
