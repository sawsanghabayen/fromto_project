<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Contact;
use App\Models\Detail;
use App\Models\Question;
use App\Models\Setting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny' ,Contact::class);
        $contacts=Contact::paginate(5);
        return response()->view('controlpanel.contact-requests.index',['contacts'=>$contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $settings=Setting::all();
        $details=Detail::all();
        $questions=Question::all();
        $answersQ3 = Answer::where('question_id', '=', '3')->get();
        return response()->view('fromto-app.contact',['settings'=>$settings,'questions'=>$questions,'answersQ3'=>$answersQ3,'details'=>$details]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            // 'file' => 'required|',
            'subject' => 'required|string|min:3',
            'message' => 'required|string|min:3',
   
        ]);
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:admins,email',
            'subject' => 'required|string|min:3',
            'message' => 'required|string|min:3',


        ]);


        if (!$validator->fails()) {
            $contact = new Contact();
            $contact->name = $request->input('name');
            $contact->email = $request->input('email');
            $contact->subject =  $request->input('subject');
            // $contact->file = $request->input('file');
            $contact->message = $request->input('message');

            $isSaved = $contact->save();
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
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
