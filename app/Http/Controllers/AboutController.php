<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Detail;
use App\Models\Partner;
use App\Models\Question;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings=Setting::all();
        $details=Detail::all();
        $services=Service::all();
        $questions=Question::all();
        $partners=Partner::all();
        $answersQ1 = Answer::where('question_id', '=', '1')->get();
        $answersQ2 = Answer::where('question_id', '=', '2')->get();
        $answersQ4 = Answer::where('question_id', '=', '4')->get();
        return response()->view('fromto-app.about',['settings'=>$settings,'partners'=>$partners,'services'=>$services,'details'=>$details,'details'=>$details,'questions'=>$questions ,'answersQ4'=>$answersQ4,'answersQ1'=>$answersQ1 ,'answersQ2'=>$answersQ2]);

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
    public function update(Request $request, $id)
    {
        //
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
