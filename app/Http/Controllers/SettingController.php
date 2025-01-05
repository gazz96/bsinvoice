<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    function index(Request $request)
    {
        return view('setting.index');    
    }

    public function save(Request $request)
    {

        $settingFields = [
            'name'
        ];

        $settingFileSettings = [
            'logo'
        ];

        $setting = new Setting;
        foreach($settingFields as $settingField)
        {
            $setting->updateByKey($settingField, request($settingField));
        }

        foreach($settingFileSettings as $settingFileSetting)
        {
            if($request->hasFile($settingFileSetting))
            {
                $file = $request->file($settingFileSetting);
                if($file)
                {
                    $path = $file->store('setting', 'public');
                    $setting->updateByKey($settingFileSetting, $path);
                }
            }
            
        }

        return back()
            ->with('status', 'success')
            ->with('message', 'Setting Saved');
    }
    
    
    public function profile()
    {
        $user = Auth::user();
        return view('profile', [
            'user' => $user
        ]);
    }
    
    public function updateProfile(Request $request)
    {
        
        $validated = $request->validate([
            'full_name' => 'required',

            'name' => 'required',

            'password' => 'nullable',

            'photo' => 'image',

        ]);
        
        if($validated['password'] ?? '')
        {
            $validated['password'] =  Hash::make($validated['password']);
        }
        else {
            unset($validated['password']);
        }
        
        if ($request->hasFile('photo')) {

            $thumbnail = $request->file('photo');

            $validated['photo'] = $thumbnail->storeAs('photo', $thumbnail->hashName(), 'public');
        }
        
        Auth::user()
            ->update($validated );
            
        return back()
            ->with('status', 'success')
            ->with('message', 'Profile Updated');
    }
}
