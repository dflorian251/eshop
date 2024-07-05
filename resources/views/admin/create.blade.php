@extends('layouts.master')

@section('content')
<h2>Create New Item</h2>
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.create') }}" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="description">Content</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="numeric" class="form-control" id="price" name="price">
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection