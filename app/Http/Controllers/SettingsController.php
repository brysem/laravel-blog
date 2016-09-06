<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function update(Request $request)
    {
        $settings = Setting::first();
        $settings->fill($request->all());
        $settings->save();

        \Toastr::success('Changes saved.', 'Success');
        return redirect()->back();
    }
}
