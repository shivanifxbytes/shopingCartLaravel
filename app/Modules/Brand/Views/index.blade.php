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
	
	<a class="btn-sm btn-primary glyphicon glyphicon-plus" href=" {{ url('/') }}/addBrand"> {{__('messages.add')}} </a>
		
	</a>
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
						  @foreach($brands as $key => $row)
						<tr>
							<td></td>
							<td>{{$row->brand_name}}</td>
							<td>
						<div class="btn-group">
                        <a class="btn btn-success" title="{{__('messages.edit')}}" href="{{ url('/') }}/addBrand/{{ Crypt::encrypt($row->id) }}" style="margin:5px;" data-toggle="tooltip">{{__('messages.edit')}}</a> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-danger" title="{{__('messages.delete')}}" style="margin:5px;" href="{{ url('/') }}/deleteBrand/{{ Crypt::encrypt($row->id) }}"   data-toggle="tooltip">{{__('messages.delete')}}</a>
                      </div>
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