@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <!-- als er is ingelogd laten zien, anders niet -->
            @if(Session::has('userLoggedIn'))
                <h1>Welcome, {{Session::get('userLoggedIn.name')}}.</h1>
                <a class="btn btn-default" href="/verkoop" role="button">Sell your tickets</a>
                <h3>All tickets are listed below here.</h3>
                @foreach($listings as $listing)
                    <div class="col-md-3">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          {{$listing->description}} <br>
                          Sellingprice: {{$listing->sellingPrice}}
                        </div>
                          @foreach($listing->tickets as $ticket)
                            @if($ticket->boughtByUserId == null)
                              <div class="panel-body">
                                  <a href="/koopTicket/{{$ticket->id}}">Koop</a>
                                  <h4>{{$ticket->barcodes->count()}} Ticket on sale</h4>
                            @else
                              <div class="panel-body"><h4>{{$ticket->barcodes->count()}} Tickets sold </h4>
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
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login</div>
                        <div class="panel-body">

                            <form class="form-horizontal" role="form" method="POST" action="/login">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">User ID</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="id">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
