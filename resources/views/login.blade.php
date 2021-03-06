@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">

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

  </div>
</div>

@endsection
