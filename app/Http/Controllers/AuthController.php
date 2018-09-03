<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
        $this->middleware('auth:api', ['except' => ['login', 'register', 'postLogin']]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|between:3,15',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:4'
        ]);
        if ($validator->fails()) {
            return $this->errorValidator(40001, $validator);
        }
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = (new BcryptHasher)->make($request->input('password'));
        $user->save();
        $token = Auth::guard('api')->fromUser($user);
        return $this->respondWithToken($token);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->errorValidator(40001, $validator);
        }
        $credentials = $request->only('email', 'password');
        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return response()->json(['errcode' => 40001, 'errmsg' => 'Unauthorized.'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function logout()
    {
        Auth::guard('api')->logout();
        return response(['message' => 'You logged out successfully']);
    }

    public function refresh()
    {
        $token = Auth::guard('api')->refresh();
        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(Auth::guard('api')->user());
    }

    public function getCurrentToken()
    {
        $token = Auth::guard('api')->getToken()->get();
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }

    /*public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        try {

            if (!$token = $this->jwt->attempt($request->only('email', 'password'))) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent' => $e->getMessage()], 500);

        }
        return $this->respondWithToken($token);
        //return response()->json(compact('token'));
    }*/

    public function getUser() {
        return response()->json(User::all());
    }
}
