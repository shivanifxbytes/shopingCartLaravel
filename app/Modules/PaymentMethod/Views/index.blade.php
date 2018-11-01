
@extends('layouts.app')
@section('title', 'Payment Method')
@section('content')
<div class="container">
	@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif
	<br />
	<a href="{{ route('payment_method.create') }}"><button class="btn-sm btn-primary glyphicon glyphicon-plus">ADD</button></a>
	<hr />
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Payment Method Name</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		@foreach ($payment_methods as $key)
		<tr>
			<td>{{ $key->payment_method_name }}</td>

			<td>
				<form action="{{ route('payment_method.destroy',$key->payment_method_id) }}" method="POST">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-sm btn-danger">Delete</button>
					<a class="btn btn-sm btn-success" href="{{ route('payment_method.edit',$key->payment_method_id) }}">Edit</a>
					<a class="btn btn-sm btn-primary" href="{{ route('payment_method.show',$key->payment_method_id) }}">View</a>

				</form>
			</td>
		</tr>
		@endforeach
	</table>
</div>
@endsection