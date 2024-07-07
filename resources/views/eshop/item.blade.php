@extends('layouts.master')

@section('content')

<div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <img src="https://via.placeholder.com/500" class="img-fluid" alt="Item Image">
      </div>
      <div class="col-md-6">
        <h1>{{ $item->title }}</h1>
        {{-- <p class="lead">{{ $item['description'] }}</p> --}}
        <h2>${{ $item->price }}</h2>
        <button class="btn btn-primary btn-lg">Add to Cart</button>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-12">
        <h2>Customer Reviews</h2>
        <div class="media mb-4">
          <img src="https://via.placeholder.com/64" class="mr-3" alt="Customer Image">
          <div class="media-body">
            <h5 class="mt-0">Customer Name</h5>
            This is a great product! I am very satisfied with my purchase.
          </div>
        </div>
        <div class="media mb-4">
          <img src="https://via.placeholder.com/64" class="mr-3" alt="Customer Image">
          <div class="media-body">
            <h5 class="mt-0">Customer Name</h5>
            The quality is excellent and the price is reasonable. Highly recommend!
          </div>
        </div>
        <!-- Add more reviews as needed -->
      </div>
    </div>
  </div>

@endsection