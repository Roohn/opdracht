@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <!-- als er is ingelogd laten zien, anders niet -->
            @if(Session::has('userLoggedIn'))
                <h1>Welkom, {{Session::get('userLoggedIn')}}.</h1>
                <a class="btn btn-default" href="/verkoop" role="button">Verkoop je kaarten</a>
                <h3> Hier zijn alle te koop aangeboden kaartjes.</h3>
                @foreach($listings as $listing)
                    <div class="col-md-3">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          {{$listing->description}} <br>
                          Verkoopprijs: {{$listing->sellingPrice}}
                        </div>
                          @foreach($listing->tickets as $ticket)
                            @if($ticket->boughtByUserId == null)
                              <div class="panel-body"><h4>{{$ticket->barcodes->count()}} kaart(en) aangeboden</h4>
                            @else
                              <div class="panel-body"><h4>{{$ticket->barcodes->count()}} kaart(en) verkocht</h4>
                            @endif
                            <ul class="list-group">
                            @foreach($ticket->barcodes as $barcode)
                              <li class="list-group-item">{{$barcode->barcode}}</li>
                            @endforeach
                            </ul>
                          </div>
                          @endforeach
                      </div>
                    </div>
                @endforeach
            @else
                <h1>Log in om verder te gaan</h1>
            @endif
        </div>
    </div>
</div>
@endsection
