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
</div>
@endsection
