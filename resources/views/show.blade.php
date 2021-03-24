@extends('layouts.app')

@section('content')
<style>
  img {
    width: 100%;
    height: 200px !important;
  }
</style>
<div class="container">
  <div class="card" >
    <div class="row">
      <aside class="col-sm-5 border-right">
        <section class="gallery-wrap">
          <div class="img-big-wrap">
            <a href="">
              <img src="{{ Storage::url($product->image) }}" style="width:100%; height:450px !important;">
            </a>
          </div>
        </section>
      </aside>
      <aside class="class-sm-7">
        <section class="card-body p-5">
          <h3 class="title mb-3">
            {{ $product->name }}
          </h3>
          <p class="price-detail-wrap">
            <span class="price h3 text-success">
              <span class="currency">{{ $product->price }}€</span>
            </span>
          </p>
          <h3>Details of the product</h3>
          <p>{!! $product->description !!}</p>
          <h3>Additional informations</h3>
          <p>{!! $product->additional_info !!}</p>
          <hr>
          <a href="" class="btn btn-lg btn-outline-primary text-uppercase">Add to cart</a>
        </section>
      </aside>
    </div>
  </div>

  @if (count($productFromSameCategories) > 0)
      
  <div class="jumbotron">
    <h3>You may also be interested in</h3>
    <div class="row">
      @foreach ($productFromSameCategories as $product)
          
      <div class="col-4">
        <div class="card shadow-sm">
          <img src="{{ Storage::url($product->image) }}" style="width: 100%; height:300px; object-fit: cover;">  
          <div class="card-body">
            <p><b>{{ $product->name }}</b></p>
            <p class="card-text">
              {!! Str::limit($product->description, 120) !!}
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="{{ route('product.view', [$product->id]) }}">
                  <button type="button" class="btn btn-sm btn-outline-success">Details</button>
                </a>
                <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
              </div>
              <small class="text-muted">{{ $product->price }}€</small>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  @endif

</div>
@endsection
