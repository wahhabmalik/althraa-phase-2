<?php

namespace App\Http\Controllers;

use App\Report;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Constant;
use PDF;
use Session;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    public function downloadReport(Request $request)
    {
        $this->validate($request, [
            "q" => ['required', 'string', 'max:40', 'min:39'],
        ]);

        $report = Report::where('public_id',$request->q)->latest('created_at')->first();

        if(!$report){
            return redirect()->route('/', 'en');
        }

        // dd(Session::get('public_id'), $report->public_id);
        // if(Session::get('verified') && Session::get('public_id') == $report->public_id){
            Session::put('verified', 0);
            $constants = Constant::whereIn('constant_attribute', ['Option_1','Option_2','Option_3',])->orWhere('constant_meta_type', 'Capitel_Deployment')->get();
            return view('dashboard.pdf.report')
                        ->with('data', json_decode($report->report_data, true))
                         ->with('constants', $constants);
        // }

        Session::put('public_id', $request->q);
        Session::put('user_id', $report->user_id);
        return view('auth.mobile_verify');

    }

    public function getUserReport(Request $request)
    {
        $report = Report::where('user_id',$request->user)->latest('created_at')->first();

        if(!$report)
            return redirect()->back();
        
        if(!auth()->user()->hasRole('admin'))
            abort(404);
        
        return view('dashboard.pdf.report')->with('data', json_decode($report->report_data, true));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
