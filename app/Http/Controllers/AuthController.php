<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
use Validator;
use App\Models\User;
use App\Events\NewUser;
// use Illuminate\Support\Facades\validate;
// use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth.api',['except'=>['login','register','logout','profile']]);
    }

    public function login(Request $request)
    {
        

         $ff=Validator::make($request->all(), [
           
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:2'],
        ]);

        if ($ff->fails()) {
            
            return 'field required';
        }

       $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }

     public function register(Request $request)
    {


       $ff=Validator::make($request->all(), [
            'Fname' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:2'],
        ]);

        if ($ff->fails()) {
            // code...
            return response()->json()->errors()->toJson();
        }

        
            $data=new user;
            $data->Fname = $request->Fname;
            $data->Mname = $request->Mname;
            $data->Lname = $request->Lname;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->picture_url = $request->picture_url;
            $data->password =bcrypt($request->password);
            $data->save();
       
event(new NewUser($data));
            // App\Events\NewUser::dispatch($data);
         
    }

     public function profile(Request $request)
    {
      
        $user = Auth::user();
        return response()->json([
                'status' => 'success',
                'user' => $user
                
            ]);
    }

       public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Asset::findOrFail($id);
        $data->update($request->all());
    return "Updated successfully".','.$data;
    }

    public function delete(Request $request, $id)
    {
        $data = Asset::findOrFail($id);
        $data->delete();

        return 'item deleted';
    }

}
