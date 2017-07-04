<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Ticket;
use App\Barcode;
use App\Listing;
use App\User;
use Session;
use Redirect;

class TicketController extends Controller
{

    public function verkoop() {
      $listings = Listing::with('tickets.barcodes')->get();
      return view('verkoop')->with('listings', $listings);
    }

    public function addVerkoop(Request $request) {

        foreach($request->barcodes as $key => $value) {
            $barcodes[$key] = $value;
        }

        foreach($request->barcodes as $key => $value) {
            if (Barcode::where('barcode', '=', $value)->exists()) {
                $ticketId = Barcode::where('barcode', '=', $value)->first()->ticketId;
                //ticket nooit gekocht door dezelfde gebruiker
                if(Ticket::where('id', '=', $ticketId)->first()->boughtByUserId != $request->userID) {
                    return Redirect::back()->withErrors('Barcode already exists');
                }
            }
        }

        //maak eerst een nieuwe ticket aan
        $ticket = new Ticket;
        $ticket->listingId = $request->listing;
        $ticket->fromUserId = $request->userID;
        $ticket->save();

        //sla voor elke barcode een nieuwe value op (met goede ticket id)
        foreach($request->barcodes as $key => $value) {
            $barcodes = new Barcode;
            $barcodes->ticketId = Ticket::orderBy('id', 'desc')->first()->id;
            $barcodes->barcode = $value;
            $barcodes->save();

            return redirect('/');
        }
    }

    public function koopTickets(Request $request) {
        $ticket = Ticket::find($request->id);
        $ticket->boughtByUserId = Session::get('userLoggedIn.id');
        $ticket->save();

        return redirect('/');
    }
}
