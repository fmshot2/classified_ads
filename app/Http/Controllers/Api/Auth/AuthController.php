<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'checkEmailIfExist']]);
    }

    /**
     * login
     *
     * @param  mixed $request
     * @return void
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $token_validity = (24 * 60);

        $this->guard()->factory()->setTTL($token_validity);

        if (!$token = $this->guard()->attempt($validator->validated())) {
            return response()->json([
                'error' => 'Unauthorized!'
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * register
     *
     * @param  mixed $request
     * @return void
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:3,50',
            'email' => 'required|email|unique:users',
            'role' => 'string',
            'password' => 'required|min:6',
            // 'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([$validator->errors()], 422);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User created successfully!',
            'user' => $user
        ]);
    }

    public function checkEmailIfExist(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();

        if ($user === null && collect($user)->isEmpty()) {
            return response()->json([
                'status' => 1,
                'message' => 'This E-mail address is available.'
                ], 200);
        }
        else{
            return response()->json([
                'status' => 0,
                'error' => 'E-mail address is already taken!'
                ], 404);
        }
    }

    /**
     * profile
     *
     * @return void
     */
    public function profile()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['User logged out successfully!']);
    }

    /**
     * refresh
     *
     * @return void
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * respondWithToken
     *
     * @param  mixed $token
     * @return void
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'token_validity' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * guard
     *
     * @return void
     */
    protected function guard()
    {
        return Auth::guard('api');
    }
}
