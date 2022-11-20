<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->authorizeResource(Setting::class, 'setting');
    }

    public function index()
    {
        $settings=Setting::all();
        // return response()->view('fromto-app.parent',['settings'=>$settings]);
        return response()->view('controlpanel.settings.index',['settings'=>$settings]);
    
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return response()->view('controlpanel.settings.edit',['setting'=>$setting]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email|unique:settings,email,'.$setting->id,
            'mobile' => 'required|min:10',
            'location' => 'required|string|min:3',
            'facebook_url' => 'required|string|min:3',
            'instgram_url' => 'required|string|min:3',
            'twitter_url' => 'required|string|min:3',
            'linkedin_url' => 'required|string|min:3',
            'logo' => 'nullable|image|mimes:jpg,png|max:2048',


        ]);
        if (!$validator->fails()) {
            $setting->email = $request->get('email');
            $setting->mobile = $request->get('mobile');
            $setting->location = $request->get('location');
            $setting->facebook_url = $request->get('facebook_url');
            $setting->instgram_url = $request->get('instgram_url');
            $setting->twitter_url = $request->get('twitter_url');
            $setting->linkedin_url = $request->get('linkedin_url');
            
            if ($request->hasFile('logo')) {
                   

                Storage::delete($setting->logo);
                     
                $file = $request->file('logo');
                $imageName =  time().'_setting_image.' . $file->getClientOriginalExtension();
                $status = $request->file('logo')->storePubliclyAs('images/settings', $imageName);
                $imagePath = 'images/settings/' . $imageName;
                $setting->logo = $imagePath;
            
        }
            // $setting->logo = $request->get('logo');

            $isSaved = $setting->save();
            return response()->json(['message' => $isSaved ?  __('cms.create_success') : __('cms.create_failed')], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
