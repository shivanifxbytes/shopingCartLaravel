<?php
echo "brand add";
?>
@extends('layouts.app')
@section('title', 'Brand Create Page')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<h2>Add New Brand</small></h2>
			<hr class="colorgraph">
			<form action="" cl id="productform" role="form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<!-- Name Field -->
				<div class="form-group">
					<input type="text" name="brand_name" value="" id="brand_name" class="form-control input-lg" maxlength="100" placeholder="Brand Name" tabindex="3"  value=""/>
				</div>
			<div class="row">
				<div class="col-xs-12 col-md-3">
					<input type="submit" name="updateUser" value="SAVE"  class="btn btn-primary btn-lg" tabindex="7" />
				</div>
			</div>
		</form>           
	</div>
</div>
</div>
@endsection