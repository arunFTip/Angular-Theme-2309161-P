<?php

namespace App\Business\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Helper;
use Carbon;
use UserModel;

class AuthController extends Controller
{

    public function run()
    {
        return view('index');
    }


}
