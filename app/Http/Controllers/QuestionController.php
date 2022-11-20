<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->authorizeResource(Question::class, 'question');
    }

    public function index()
    {
        $questions =Question::all();
        return response()->view('controlpanel.questions.index', ['questions' => $questions]);
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
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return response()->view('controlpanel.questions.edit', ['question' => $question]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $validator = Validator($request->all(), [
            'title' => 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',

        ]);
        if (!$validator->fails()) {
            $question->title = $request->get('title');
            $question->title_ar = $request->get('title_ar');

            if ($request->hasFile('image')) {
                Storage::delete($question->image);
                $file = $request->file('image');
                $imageName =  time().'_question_image.' . $file->getClientOriginalExtension();
                $status = $request->file('image')->storePubliclyAs('images/questions', $imageName);
                $imagePath = 'images/questions/' . $imageName;
                $question->image = $imagePath;
            
        }

            $isSaved = $question->save();
            return response()->json(['message' => $isSaved ?  __('cms.create_success') : __('cms.create_failed')], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
