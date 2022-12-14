<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function showLoginView(Request $request)
    {
        $validator = Validator(
            ['guard' => $request->guard],
            ['guard' => 'required|string|in:admin,user']
        );
        if (!$validator->fails()) {
            session()->put('guard', $request->guard);
            return response()->view('controlpanel.auth.login',['guard'=>$request->guard]);
        } else {
            abort(Response::HTTP_NOT_FOUND);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:3',
            'remember' => 'required|boolean',
        ]);

        if (!$validator->fails()) {
            $credentials = [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ];
            if (Auth::guard(session()->get('guard'))->attempt($credentials, $request->input('remember'))) {
                return response()->json(['message' => 'Logged in successfully']);
            } else {
                return response()->json(['message' => 'Login failed, check credentials'], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
    public function profilePersonalInformation(Request $request)
    {
        $user = auth('admin')->user();
        return response()->view('controlpanel.auth.profile.personal-information', ['user' => $user]);
    }

    public function logout(Request $request)
    {
        // dd($request->guard);
        $guard = session('guard');
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('cms.login', $guard);
    }
}
