<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function edit(Setting $setting)
    {
        $setting = Setting::first();
        return view('admin.setting.edit', compact('setting'));
    }


    public function update(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'name'      => 'required',
            'copyright' => 'required',
        ]);

        $setting = Setting::first();
        $setting->update($request->all());

        if ($request->hasFile('site_logo')) {
            $site_logo               = $request->site_logo;
            $site_logo_new_name      = time() . '.' . $site_logo->getClientOriginalExtension();
            $site_logo->move('storage/setting/', $site_logo_new_name);
            $setting->site_logo      = 'storage/setting/' .$site_logo_new_name;
            $setting->save();
        }

        Session::flash('success','Setting updated successfully');
        return redirect()->back();
    }

}
