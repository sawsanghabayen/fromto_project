<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Detail;
use App\Models\Partner;
use App\Models\Question;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // public function __construct()
    // {
    //     $this->authorizeResource(Detail::class, 'detail');
    // }
    public function index()
    {
        $settings=Setting::all();
        $details=Detail::all();
        $services=Service::all();
        $questions=Question::all();
        $partners=Partner::all();
        $answersQ1 = Answer::where('question_id', '=', '1')->get();
        $answersQ2 = Answer::where('question_id', '=', '2')->get();



    // dd($answersQ1);
        $settings=Setting::all();

        if (auth('admin')->check()) {
            return response()->view('controlpanel.details.index',['details'=>$details]);
        }
        else{
            // dd($answersQ2);

        return response()->view('fromto-app.index',['settings'=>$settings,'partners'=>$partners,'services'=>$services,'details'=>$details,'details'=>$details,'questions'=>$questions ,'answersQ1'=>$answersQ1,'answersQ2'=>$answersQ2]);

        }
        

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
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        // $this->authorize('update' ,Detail::class);

        return response()->view('controlpanel.details.edit', ['detail' => $detail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        $this->authorize('update' , Detail::class);

        $validator = Validator($request->all(), [
            'title' => 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            'content' => 'required|string|min:3',
            'content_ar' => 'required|string|min:3',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);
        if (!$validator->fails()) {
            $detail->title = $request->get('title');
            $detail->title_ar = $request->get('title_ar');
            $detail->content = $request->get('content');
            $detail->content_ar = $request->get('content_ar');
            if ($request->hasFile('image')) {
                   

                Storage::delete($detail->image);
                     
                $file = $request->file('image');
                $imageName =  time().'_detail_image.' . $file->getClientOriginalExtension();
                $status = $request->file('image')->storePubliclyAs('images/details', $imageName);
                $imagePath = 'images/details/' . $imageName;
                $detail->image = $imagePath;
            
        }
            $isSaved = $detail->save();
            return response()->json(['message' => $isSaved ?  __('cms.update_success') : __('cms.update_failed')], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        //
    }
}
