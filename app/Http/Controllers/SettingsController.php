<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.setting.index');
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
    public function update(Request $request)
    {
        $request->validate([
            'mobile' => 'nullable|numeric',
            'email' => 'nullable|email',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'google' => 'nullable|string',
            'rss' => 'nullable|string',
            'youtube' => 'nullable|string',
            'instagram' => 'nullable|string',
            'line1' => 'nullable|string',
            'time1' => 'nullable|string',
            'logo' => 'nullable|image',
            'about' => 'nullable|string',         

        ]);

        update_static_option('mobile', $request->mobile);
        update_static_option('email', $request->email);
        update_static_option('address', $request->address);

        update_static_option('facebook', $request->facebook ?? '#');
        update_static_option('twitter', $request->twitter ?? '#');
        update_static_option('linkedin', $request->linkedin ?? '#');
        update_static_option('google', $request->google ?? '#');
        update_static_option('rss', $request->rss ?? '#');
        update_static_option('youtube', $request->youtube ?? '#');
        update_static_option('instagram', $request->instagram ?? '#');

        update_static_option('facebook_page_id', $request->facebook_page_id);
        update_static_option('facebook_page_access_token', $request->facebook_page_access_token);

        update_static_option('line1', $request->line1);
        update_static_option('time1', $request->time1);
     
       if($request->hasFile('logo')){
        update_static_option('logo',file_uploader('uploads/logo/', $request->logo, Carbon::now()->format('Y-m-d H-i-s-a') .'-'. Str::random(8)));
        
      }
      
      return back()->with('success','Successfully updated');

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
