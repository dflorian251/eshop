@extends('layouts.master')

@section('content')
<h2>Update New Item</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.update') }}" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $item['title'] }}">
            </div>
            <div class="form-group">
                <label for="description">Content</label>
                <input type="text" class="form-control" id="description" name="description" >
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="numeric" class="form-control" id="price" name="price" value="{{ $item['price'] }}">
            </div>
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $itemId }}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection