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

    @foreach ($products as $key)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <td>{{$key->product_name}}</td>
            </tr>
            <tr>
                <th>Product Description</th>
                <td>{{$key->product_description}}</td>
            </tr>
             <tr>
                <th>Product Price</th>
                <td>{{$key->product_price}}</td>
            </tr>
              <tr>
                <th>Product Price</th>
                <td>{{$key->product_price}}</td>
            </tr>
              <tr>
                <th>Product Discount</th>
                <td>{{$key->product_discount}}</td>
            </tr>
              <tr>
                <th>Product Selling Price</th>
                <td>{{$key->product_selling_price}}</td>
            </tr>
        </thead>
    </table>
    @endforeach  
    <a href="{{ route('category.index') }}"><button class="btn-sm btn-primary glyphicon glyphicon-back">Go Back</button></a>
</div>
@endsection