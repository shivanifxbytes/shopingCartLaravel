@extends('layouts.app')
@section('title', 'Category')
@section('content')
<div class="container-fluid">
	@if ($errors->any())
      @foreach ($errors->all() as $error)
      <p class="error alert alert-block alert-danger fade in">
        {{ $error }}
      </p>
      @endforeach
      @endif
      @if(session()->has('message'))
      <div class="alert alert-success">
        {{ session()->get('message') }}
      </div>
      @endif
	<br />
	<a href=""><button class="btn-sm btn-primary glyphicon glyphicon-plus">{{__('messages.add')}}</button></a>
	<hr />
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">{{ __('messages.brand') }}</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Brand Name</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tr>
							<td></td>
							<td></td>
							<td>
								<form action="" method="POST">
									@csrf
									@method('DELETE')
									<a class="btn btn-sm btn-success" href="">{{__('messages.edit')}}</a>
									<button type="submit" class="btn-sm btn-danger">{{__('messages.delete')}}</button>
								</form>
							</td>
						</tr>
					</table>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
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