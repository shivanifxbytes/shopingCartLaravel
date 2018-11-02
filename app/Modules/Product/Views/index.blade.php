@extends('layouts.app')
@section('title', 'Admin')
@section('content')

   @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
@endif
<br />
<a href="{{ route('addProduct') }}"><button class="btn-sm btn-primary glyphicon glyphicon-plus">ADD</button></a>
<hr />
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Products</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th>Product Name</th>
							<th>Product Price</th>
							<th>Discount</th>
							<th>Product Final Price</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($products as $key)
						<tr>
							<td>{{ $key->product_name }}</td>
							<td>{{ $key->product_price }}</td>
							<td>{{ $key->product_discount }}</td>
							<td>{{ $key->product_selling_price }}</td>
							<td class="text-center">


                    <a class="btn btn-info" href="{{ route('product.show',$key->product_id) }}">Show</a>

 
                    <a class="btn btn-primary" href="{{ route('addProduct',$key->product_id) }}">Edit</a>

               <a class="btn btn-danger" href="{{ route('product.destroy',$key->product_id) }}">Delete</a>


   
							</td>
						</tr>
						@endforeach
					</tbody>
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