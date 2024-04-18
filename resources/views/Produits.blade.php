@extends('Master_page')
@section('title','Produits')

@section('content')

<link rel="stylesheet" href="{{ asset('css/body.css') }}">

<body>

  <div class="container py-5">
    <h1 class="text-center">NEW COLECTION FOR  {{ $categorie }}</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
      @foreach ($products as $item)
      <div class="col">
        <div class="card">
          <a href="{{ asset('product_detail/'.$item->id) }}">
            <img src="{{ asset('imgs/'.$item['image']) }}" class="card-img-top" alt="...">
        </a>
          <div class="card-body">
            <h5 class="card-title">{{$item['titre']}}</h5>
            <p class="card-text">The goal is to provide potential customers with a clear understanding of the product's features, benefits.</p>
          </div>
          <div class="mb-5 d-flex justify-content-around">
            <h3>{{$item['prix']}}DH</h3>
            <button class="btn btn-dark">Buy Now</button>
          </div>
        </div>
      </div>
      @if($loop->iteration % 3 == 0)
      </div><div class="row row-cols-1 row-cols-md-3 g-4 py-5">
      @endif
      @endforeach
    </div>
  </div>

</body>
@endsection
