@extends('layouts.app')
@section('title', 'Product')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			@if(isset($errors))
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@endif

			@foreach ($products as $key)
			<form action="" cl id="productform" role="form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
@csrf				<!-- Name Field -->
				<div class="form-group">
					<input type="text" name="product_name"  id="product_name" class="form-control input-lg" maxlength="100" placeholder="Product Name" tabindex="3"  value="{{$key->product_name}}"/>
				</div>
				<!-- Name Field -->
				<div class="form-group">
					<input type="text" name="product_description" value="{{$key->product_description}}" id="product_description" class="form-control input-lg" maxlength="100" placeholder="Product Description" tabindex="3"  />
				</div>
				<!-- Email Field -->
				<div class="form-group">
					<input type="text" name="product_price" value="{{$key->product_price}}" id="product_price" class="form-control input-lg" maxlength="100" placeholder="Product Price" tabindex="3"  />
				</div>
				<!-- Password Field -->
				<div class="form-group">
					<input type="text" name="product_discount" value="{{$key->product_discount}}" id="product_discount" class="form-control input-lg" maxlength="100" placeholder="product discount" tabindex="3"  />
				</div>
				<!-- Mobile Number Field -->
				<div class="form-group">
					<input type="text" name="product_selling_price" value="{{$key->product_selling_price}}" id="product_selling_price" class="form-control input-lg" maxlength="100" placeholder="product selling price" tabindex="3"  disabled="" readonly="" />
				</div>
				@endforeach
				<div class="form-group">
					<label for="category_name" class="sr-only">Category Name</label><select name="category_name" id="category_name" class="form-control" >
						<option value="0" selected="selected">Select Category</option>
	@foreach ($categories as $key) 
						<option value="	{{$key->category_id}}">	{{$key->category_name}}</option>
						@endforeach
					</select>
				</div>
				<input type="file" name="product_image"  />
				<hr />
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
 <script src="{{ asset('public/js/discount_calculate.js') }}" defer></script>

@endsection