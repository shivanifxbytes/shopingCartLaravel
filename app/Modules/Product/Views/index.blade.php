@extends('layouts.app')
@section('title', 'Admin')
@section('content')
<div class="container">
	@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif
	<br />
	<a href="{{ route('product.create') }}"><button class="btn-sm btn-primary glyphicon glyphicon-plus">ADD</button></a>
	<hr />
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Discount</th>
				<th>Product Final Price</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		@foreach ($products as $key)
		<tr>
			<td>{{ $key->product_name }}</td>
			<td>{{ $key->product_price }}</td>
			<td>{{ $key->product_discount }}</td>
			<td>{{ $key->product_selling_price }}</td>
			<td class="text-center">
				<a href=""><button class="btn-sm btn-danger">Delete</button></a>
				<a href="{{ route('product.edit',$key->product_id) }}"><button class="btn-sm btn-success">Edit</button></a>
				<a href=""><button class="btn-sm btn-primary">Show</button></a>
			</td>
		</tr>
		@endforeach
	</table>
</div>
@endsection