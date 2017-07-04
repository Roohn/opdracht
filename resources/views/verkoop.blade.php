@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- als er is ingelogd laten zien, anders niet -->
            @if(Session::has('userLoggedIn'))
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">What tickets do you want to sell?</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="/verkoop">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="userID" value="{{Session::get('userLoggedIn.id')}}">

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Concert</label>
                                    <div class="col-md-8">
                                        <select name="listing" class="form-control">
                                            @foreach($listings as $listing)
                                                <option value="{{$listing->id}}">{{$listing->description}} - {{$listing->sellingPrice}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Barcode</label>
                                    <div class="col-md-8">
                                        <input type="text" name="barcodes[]" class="form-control" placeholder="EAN-13:111111111" style="margin-bottom: 15px">
                                        @if($errors->any())
                                            <div class="alert alert-danger">{{$errors->first()}}</div>
                                        @endif
                                    </div>
                                </div>

                                <a href="#" id="add">add another barcode</a>
                                <div class="form-group" id="button">
                                    <div class="col-md-6 col-md-offset-5">
                                        <button type="submit" class="btn btn-primary">
                                            Sell!
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
