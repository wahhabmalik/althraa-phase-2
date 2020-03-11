<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Carbon\Carbon;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\User::role(['admin', 'moderator'])->pluck('id')->toArray();
        // dd($users);
        $logs = Activity::where('causer_type', 'App\User')
                ->whereIn('causer_id', $users)
                ->orderBy('created_at','DESC')
                ->get();
        // dd($logs);
        $datewise_log = [];
        foreach ($logs as $key => $value) {
            $datewise_log[Carbon::parse($value->created_at)->format('d-m-Y')][] = $value;
        }
        // dd($datewise_log);
        return view('dashboard.control_panel.logs.index')
                ->with([
                    'title' => __('lang.activity_log.activity_log')
                ])
                ->with('logs', $logs)
                ->with('datewise_log', $datewise_log);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
