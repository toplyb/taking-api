<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\User;
use GuzzleHttp\Client;

class RegisterController extends Controller
{

    private $http;

    public function __construct(Client $http)
    {
        $this->http = $http;
    }

    public function register(RegisterUserRequest $registerUserRequest)
    {
        $user = User::create([
            'name' => $registerUserRequest->name,
            'email' => $registerUserRequest->email,
            'password' => bcrypt($registerUserRequest->password)
        ]);

        $response = $this->http->post('http://taking.test/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '2',
                'client_secret' => 'QgwnVQsTgOUeDMUNUscIi2jnaTHBWn49xvLZWhr3',
//                'username' => $registerUserRequest->input('email'),
                'username' => $user->email,
//                'password' => $registerUserRequest->input('email'),
                'password' => $user->password,
                'scope' => '*'
            ],
        ]);

        $token = json_decode((string) $response->getBody(), true);
        return response()->json([
            'token' => $token
        ],201);
    }
}
