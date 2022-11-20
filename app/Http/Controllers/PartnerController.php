<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->authorizeResource(Partner::class, 'partner');
    }
    public function index()
    {
        $partners =partner::all();
        return response()->view('controlpanel.partners.index', ['partners' => $partners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('controlpanel.partners.create');
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
            'logo' => 'required|image|mimes:jpg,png|max:2048',

        ]);

        if (!$validator->fails()) {
        $partner = new Partner();
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $imageName =  time().'_partner_image.' . $file->getClientOriginalExtension();
            $status = $request->file('logo')->storePubliclyAs('images/partners', $imageName);
            $imagePath = 'images/partners/' . $imageName;
            $partner->logo = $imagePath;
        }
        $isSaved = $partner->save();
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
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {

        return response()->view('controlpanel.partners.edit', ['partner' => $partner ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $validator = Validator($request->all(), [
            'logo' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

        if (!$validator->fails()) {


            if ($request->hasFile('logo')) {
                   

                Storage::delete($partner->logo);
                     
                $file = $request->file('logo');
                $imageName =  time().'_partner_image.' . $file->getClientOriginalExtension();
                $status = $request->file('logo')->storePubliclyAs('images/partners', $imageName);
                $imagePath = 'images/partners/' . $imageName;
                $partner->logo = $imagePath;
            
        }
            
            $isSaved = $partner->save();
            if ($isSaved) return response()->json([
                'message' => $isSaved ? 'Saved successfully' : 'Save failed!'
            ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $deleted = $partner->delete();
        if ($deleted) {
            Storage::delete($partner->logo);
        }
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
