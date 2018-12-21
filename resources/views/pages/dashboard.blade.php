@extends('default')
@section('content')
<form action="{{ URL::to('insert') }}" method="post">
	{{ csrf_field() }}
	<a style="float: right;"  class="btn btn-danger" href="{{ URL::to('logout') }}">Logout</a>
	<div class="input-group" style="margin: 15px 0 15px 0;">
		<div class="input-group-prepend">
		    <span class="input-group-text" id="">Name</span>
		</div>
		<input class="form-control col-md-2" type="text" name="name" placeholder="Name" size="15">
		<div class="input-group-prepend">
		    <span style="margin-left: 15px;" class="input-group-text" id="">Address</span>
		</div>
		<input class="form-control col-md-5" type="text" name="address" placeholder="Address" size="33">
		<button style="margin-left: 15px;" type="submit" class="btn btn-success" href="">Insert</button>
	</div>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Address</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@if($obj)
		  	@foreach($obj as $d)
		    <tr>
		      <th scope="row">{{ $d->id }}</th>
		      <td>{{ $d->name }}</td>
		      <td>{{ $d->address }}</td>
		      <td><a href="{{ URL::to('/edit/'.$d->id) }}" class="btn btn-primary">Edit</a><button type="button" class="btn btn-danger" style="margin-left: 5px;" data-toggle="modal" data-target="#exampleModal">Delete</button></td>
		    </tr>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-danger" href="{{ URL::to('/delete/'.$d->id) }}" style="margin-left: 5px;" href="">Delete</a>
      </div>
    </div>
  </div>
</div>
		    @endforeach
		    @endif
		  </tbody>
		</table>
</form>
@stop