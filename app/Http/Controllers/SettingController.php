<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('setting.index', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        foreach ($request->except(['_token', '_method']) as $name => $value) {
            $rules[$name] = "required";
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return back()->withInput()->with('error', 'All fields are required!');

        foreach ($request->except(['_token', '_method']) as $name => $value) {
            $settings = Setting::where('name', $name)->firstOrfail();
            $settings->value = $value;
            $settings->save();
        }

        return back()->with('message', 'Successful!');
    }
}
