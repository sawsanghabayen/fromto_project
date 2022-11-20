<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->authorizeResource(Service::class, 'service');
    }

    public function index()
    {
        $services =Service::all();
        return response()->view('controlpanel.services.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('controlpanel.services.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'title' => 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            'content' => 'required|string|min:3',
            'content_ar' => 'required|string|min:3',
            'image' => 'required|image|mimes:jpg,png|max:2048',

        ]);

        if (!$validator->fails()) {
            $service = new service();
            $service->title = $request->input('title');
            $service->title_ar = $request->input('title_ar');
            $service->content = $request->input('content');
            $service->content_ar = $request->input('content_ar');
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName =  time().'_service_image.' . $file->getClientOriginalExtension();
                $status = $request->file('image')->storePubliclyAs('images/services', $imageName);
                $imagePath = 'images/services/' . $imageName;
                $service->image = $imagePath;
            }
            $isSaved = $service->save();
            if ($isSaved)
            // $this->saveImage($request, $service, 'image');
            return response()->json(
                ['message' => $isSaved ? 'Saved successfully' : 'Save failed!'],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return response()->view('controlpanel.services.edit', ['service' => $service]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validator = Validator($request->all(), [
            'title' => 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            'content' => 'required|string|min:3',
            'content_ar' => 'required|string|min:3',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);

        if (!$validator->fails()) {
            $service->title = $request->get('title');
            $service->title_ar = $request->get('title_ar');
            $service->content = $request->get('content');
            $service->content_ar = $request->get('content_ar');
            

                if ($request->hasFile('image')) {
                   

                        Storage::delete($service->image);
                             
                        $file = $request->file('image');
                        $imageName =  time().'_service_image.' . $file->getClientOriginalExtension();
                        $status = $request->file('image')->storePubliclyAs('images/services', $imageName);
                        $imagePath = 'images/services/' . $imageName;
                        $service->image = $imagePath;
                    
                }
                $isSaved = $service->save();

                if($isSaved)
            return response()->json(['message' => $isSaved ?  __('cms.update_success') : __('cms.update_failed')], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $deleted = $service->delete();
        return response()->json(
            [
                'title' => $deleted ? 'Deleted!' : 'Delete Failed!',
                'text' => $deleted ? 'User deleted successfully' : 'User deleting failed!',
                'icon' => $deleted ? 'success' : 'error'
            ],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
