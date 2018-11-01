@extends('layouts.app')
@section('title', 'Payment Method')
@section('content')
<div class="container-fluid">
	@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif
	<br />
	<a href="{{ route('payment_method.create') }}"><button class="btn-sm btn-primary glyphicon glyphicon-plus">ADD</button></a>
	<hr />
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Payment Method</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">		<thead>
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
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
@endsection
@section('scripts')
<!-- DataTables JavaScript -->
<script src="{!! asset('public/theme/vendor/datatables/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('public/theme/vendor/datatables-plugins/dataTables.bootstrap.min.js') !!}"></script>
<script src="{!! asset('public/theme/vendor/datatables-responsive/dataTables.responsive.js') !!}"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});
	});
</script>
@endsection