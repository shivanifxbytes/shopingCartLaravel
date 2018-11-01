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

    @foreach ($categories as $key)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Category Name</th>
                <td>{{$key->category_name}}</td>
            </tr>
        </thead>
    </table>
    @endforeach  
    <a href="{{ route('category.index') }}"><button class="btn-sm btn-primary glyphicon glyphicon-back">Go Back</button></a>
</div>
@endsection