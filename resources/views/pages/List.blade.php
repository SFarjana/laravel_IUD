@extends('default')
@section('content')
<a style="float: right;"  class="btn btn-danger" href="{{ URL::to('logout') }}">Logout</a>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Address</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@if($obj)
		  	@foreach($obj as $d)
		    <tr>
		      <th scope="row">{{ $d->id }}</th>
		      <td>{{ $d->name }}</td>
		      <td>{{ $d->address }}</td>
		    @endforeach
		    @endif
		  </tbody>
		</table>
</form>
@stop