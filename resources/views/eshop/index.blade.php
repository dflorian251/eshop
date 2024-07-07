@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <p class="quote">ESHOP</p>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($items as $item)
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Item Image">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('eshop.item', ['id' => $item->id]) }}">{{ $item->title }}</a></h5>
                    <p class="card-text">{{ $item->description }}</p>
                    <div class="tags">
                        @foreach ($item->tags as $tag)
                        <span class="badge bg-secondary">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                    <p class="card-text"><strong>${{ $item->price }}</strong></p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        </div>
        @endforeach

        <div class="row">
            <div class="col-md-12 text-center ">
                {{ $items->links('pagination::bootstrap-4') }}
            </div>
        </div> 
    </div>
</div>
@endsection