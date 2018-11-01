@extends('layouts.app')
@section('title', 'Category')
@section('content')
<div class="container">
	@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif
	<br />
	<a href="{{ route('category.create') }}"><button class="btn-sm btn-primary glyphicon glyphicon-plus">ADD</button></a>
	<hr />
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Category Name</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		@foreach ($categories as $key)
		<tr>
			<td>{{ $key->category_name }}</td>

			<td>
				<form action="{{ route('category.destroy',$key->category_id) }}" method="POST">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn-sm btn-danger">Delete</button>
					<a class="btn btn-sm btn-primary" href="{{ route('category.show',$key->category_id) }}">View</a>
					<a class="btn btn-sm btn-success" href="{{ route('category.edit',$key->category_id) }}">Edit</a>
				</form>
			</td>
		</tr>
		@endforeach
	</table>
</div>
@endsection