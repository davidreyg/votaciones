<?php

namespace App\Http\Controllers\Api\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setSetting(Request $request)
    {
        return Setting::setSetting($request->key, $request->value);
    }
    public function getSetting(Request $request)
    {
        $setting =  Setting::getSetting($request->key);
        return response()->json([
            'data' => $setting,
        ]);
    }
}
