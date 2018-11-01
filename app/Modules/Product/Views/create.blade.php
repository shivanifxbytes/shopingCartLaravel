@extends('layouts.app')
@section('title', 'Admin')
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
			<h2>Add New product</small></h2>
			<hr class="colorgraph">
			<form action="{{ route('product.store') }}" id="productform" role="form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<!-- Name Field -->
				<div class="form-group">
					<input type="text" name="product_name" value="" id="product_name" class="form-control input-lg" maxlength="100" placeholder="Product Name" tabindex="3"  value=""/>
				</div>
				<!-- Name Field -->
				<div class="form-group">
					<input type="text" name="product_description" value="" id="product_description" class="form-control input-lg" maxlength="100" placeholder="Product Description" tabindex="3"  />
				</div>
				<!-- Email Field -->
				<div class="form-group">
					<input type="text" name="product_price" value="" id="product_price" class="form-control input-lg" maxlength="100" placeholder="Product Price" tabindex="3"  />
				</div>
				<!-- Password Field -->
				<div class="form-group">
					<input type="text" name="product_discount" value="" id="product_discount" class="form-control input-lg" maxlength="100" placeholder="product discount" tabindex="3"  />
				</div>
				<!-- Mobile Number Field -->
				<div class="form-group">
					<input type="text" name="product_selling_price" value="" id="product_selling_price" class="form-control input-lg" maxlength="100" placeholder="product selling price" tabindex="3"  />
				</div>
				<div class="form-group">
					<label for="category_name" class="sr-only">Category Name</label>
					<select name="category_name" id="category_name" class="form-control" >
						<option value="" selected="selected">Select Category</option>
						@foreach ($categories as $key) 
						<option value="	{{$key->category_id}}">	{{$key->category_name}}</option>
						@endforeach
					</select>
				</div>
				<input type="file" name="product_image"  />
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
@section('scripts')
@endsection