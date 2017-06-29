<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Ticket;
use App\Barcode;
use App\Listing;
use App\User;
class TicketController extends Controller
{
    public function getTickets() {
      return Ticket::All();
    }

    public function verkoop() {
      $listings = Listing::with('tickets.barcodes')->get();
      return view('verkoop')->with('listings', $listings);
    }
}
