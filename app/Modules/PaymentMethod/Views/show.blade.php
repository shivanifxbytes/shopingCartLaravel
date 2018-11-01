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

	@foreach ($payment_methods as $key)
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Payment Method Name</th>
				<td>{{$key->payment_method_name}}</td>
			</tr>
		</thead>
	</table>
	@endforeach  
	<a href="{{ route('payment_method.index') }}"><button class="btn-sm btn-primary glyphicon glyphicon-back">Go Back</button></a>
</div>
@endsection