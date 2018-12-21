@extends('default')
@section('content')
	
<form action="{{ URL::to('/update/'.$updata->id) }}" method="post">
	{{ csrf_field() }}
	<div class="input-group" style="margin: 15px 0 15px 0;">
		<div class="input-group-prepend">
		    <span class="input-group-text" id="">Name</span>
		</div>
		<input class="form-control col-md-2" type="text" name="name" value="{{ $updata->name }}" size="15">
		<div class="input-group-prepend">
		    <span style="margin-left: 15px;" class="input-group-text" id="">Address</span>
		</div>
		<input class="form-control col-md-5" type="text" name="address" value="{{ $updata->address }}" size="33">
		<button style="margin-left: 15px;" type="submit" class="btn btn-success" href="">Update</button>
	</div>
</form>
@stop
