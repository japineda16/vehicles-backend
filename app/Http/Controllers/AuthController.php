<?php
namespace App\Http\Controllers;
use App\User;
use App\vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string',
        ]);
        $user = new User([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'type' => ($request->type != null) ? $request->type : 2
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!', $user
        ], 201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized',
                'data' => $credentials
                ], 401);
        }
        $user = $request->user();
        if ($user->type == 2) {
            $vehicles = User::with('vehicles')->where('id', $user->id)->paginate(10);
        } if ($user->type == 1) {
            $vehicles = vehicle::with('user')->paginate(10);
        }
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'user'         => $user,
            'vehicles'     => $vehicles,
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                ->toDateTimeString(),
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' =>
            'Successfully logged out']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function getThroughUser($id) {
        $data = User::with('vehicles')->where('id', $id)->paginate(10);

        return response()->json([
            $data
        ]);
    }
}
