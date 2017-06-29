@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <!-- als er is ingelogd laten zien, anders niet -->
            @if(Session::has('userLoggedIn'))
                    <div class="col-md-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">Welke kaartjes wil jij verkopen?</div>
                          <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="/verkoop">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                              <div class="form-group">
                                <label class="col-md-2 control-label">Concert</label>
                                <div class="col-md-8">
                                  <select class="form-control">
                                    @foreach($listings as $listing)
                                      <option id="{{$listing->id}}">{{$listing->description}} - {{$listing->sellingPrice}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-2 control-label">Barcode(s)</label>
                                <div class="col-md-8">
                                  <input type="text" name="barcodes[]" class="form-control" id="barcode" placeholder="EAN-13:111111111">
                                </div>
                              </div>

                              <a href="#" id="add">Add An Input Field</a>
                              <div class="form-group" id="button">
                              	<div class="col-md-6 col-md-offset-5">
                              	 <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                              	    Verkoop!
                              	 </button>
                                </div>
                              </div>
                            </form>
                          </div>
                      </div>
                    </div>
            @else
                <h1>Log in om verder te gaan</h1>
            @endif
        </div>
    </div>
</div>
@endsection
