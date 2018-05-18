<?php

namespace App\Http\Controllers\main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class MainController extends Controller
{
  public function index() {
    return view('main.index');
  }

  public function mas() {
    return view('welcome');
  }

  public function authenticated(Request $request) {
    $user = $request->user();
    if($user) {
      if($user->admin == 1) return $user->name;
    }
    return null;
  }
}
