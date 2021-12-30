<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function Admin(){        
        return view('admin.login');
    }
    public function index()
    {
        $users= User::first()->paginate(5);
        return view('admin.index',compact('users'))->with('i',(request()->input('page',1)-1)*5);    
    }
    
    public function show(User $user)
    {
        return view('admin.show',compact('user'));
    }
  
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|string|email|',
            'phone'=>'required',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => Hash::make($request->password)
         ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }
 
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;
       if(Auth::user()->role == 'admin') {            
           $users= User::first()->paginate(5);
           return view('admin.index',compact('users'))->with('i',(request()->input('page',1)-1)*5);  
       } else{
        return response()->json(['message' => 'Hi '.$user->name,'access_token' => $token, 'token_type' => 'Bearer' ]);
       }
     
       
       
    }

    // method for user logout 
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return view('admin.login');
        
    }
}