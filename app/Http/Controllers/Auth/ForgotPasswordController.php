<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
}
