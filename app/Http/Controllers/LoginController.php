<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Listing;
use Session;
class LoginController extends Controller
{
    public function home() {
        $listings = Listing::with('tickets.barcodes')->get();
        return view('home')->with('listings', $listings);
    }

    public function showLogin() {
      return view('login');
    }

    public function doLogin(Request $request) {

      //ingevulde id ophalen
      $id = $request->id;
      $user = User::find($id);

      Session::put('userLoggedIn', $user);

      $listings = Listing::with('tickets.barcodes')->get();
      return view('home')->with('listings', $listings);
    }

    public function logout() {
        Session::forget('userLoggedIn');

        return view('home');
    }
}
