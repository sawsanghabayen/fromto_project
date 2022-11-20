<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function __construct()
    {
        $this->authorizeResource(Answer::class, 'answer');
    }

    public function index()
    {
        $answers =Answer::all();
        return response()->view('controlpanel.answers.index', ['answers' => $answers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all();
        return response()->view('controlpanel.answers.create', ['questions' => $questions]);
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
            'question_id' => 'required|numeric|exists:questions,id',
            'title' => 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            'content' => 'nullable|string|min:3',
            'content_ar' => 'nullable|string|min:3',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',


        ]);

        if (!$validator->fails()) {
            $answer = new answer();
            $answer->question_id = $request->input('question_id');
            $answer->title = $request->input('title');
            $answer->title_ar = $request->input('title_ar');
            $answer->content = $request->input('content');
            $answer->content_ar = $request->input('content_ar');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName =  time().'_answer_image.' . $file->getClientOriginalExtension();
                $status = $request->file('image')->storePubliclyAs('images/answers', $imageName);
                $imagePath = 'images/answers/' . $imageName;
                $answer->image = $imagePath;
            }
            $isSaved = $answer->save();
            if ($isSaved)
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
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        $questions = Question::all();
        return response()->view('controlpanel.answers.edit', ['answer' => $answer ,'questions'=>$questions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        $validator = Validator($request->all(), [
            'title' => 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            'content' => 'nullable|string|min:3',
            'content_ar' => 'nullable|string|min:3',
            'image' => 'nullable|mimes:jpg,png|max:2048',
        ]);
        if (!$validator->fails()) {
            $answer->title = $request->get('title');
            $answer->title_ar = $request->get('title_ar');
            $answer->content = $request->get('content');
            $answer->content_ar = $request->get('content_ar');
            
            if ($request->hasFile('image')) {
                Storage::delete($answer->image);
                $file = $request->file('image');
                $imageName =  time().'_answer_image.' . $file->getClientOriginalExtension();
                $status = $request->file('image')->storePubliclyAs('images/answers', $imageName);
                $imagePath = 'images/answers/' . $imageName;
                $answer->image = $imagePath;
            
        }
            $isSaved = $answer->save();
            if($isSaved)

            return response()->json(['message' => $isSaved ?  __('cms.update_success') : __('cms.update_failed')], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $deleted = $answer->delete();
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
