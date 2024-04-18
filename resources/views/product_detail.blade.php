@extends('Master_page')
@section('title','Produits')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
</head>

<body>
    <div class="productdisplay">
        <div class="productdisplay_left">
            <div class="productdisplay-img-list">
                @for ($i = 0; $i < 4; $i++)
                    <img src="{{ asset('imgs/'.$produit['image']) }}" alt="" srcset="" />
                @endfor
                <p>(122)</p>
            </div>
            <div class="productdisplay-img">
                <img src="{{ asset('imgs/'.$produit['image']) }}" class="productdisplay-main-img" alt="" srcset="" />
            </div>
        </div>
        <div class="productdisplay-right">
            <h1>{{ $produit['titre'] }}</h1>
            <div class="productdispay-righ-star">
                @for ($i = 0; $i < 4; $i++)
                    <img src="{{ asset('imgs/star_icon.png') }}" alt="" />
                @endfor
                <img src="{{ asset('imgs/star_dull_icon.png') }}" alt="" />
                
            </div>
            <div class="productdisplay-right-prices">
                {{-- <div class="productdisplat-right-price-old">
                    ${{ $product[''] }}
                </div> --}}
                <div class="productdisplay-right-price-new">{{ $produit['prix'] }}dh</div>
            </div>
            <div class="productdisplay-right-description">
                The goal is to provide potential customers with a clear understanding of the product's features, benefits.
            </div>
            <div class="productdisplay-right-size">
                <h1>Select size</h1>
                <div class="productdisplay-right-sizes">
                    <div>S</div>
                    <div>M</div>
                    <div>L</div>
                    <div>XL</div>
                    <div>XXL</div>
                </div>
            </div>

            <button><a href="{{ url('cart', ['id' => $produit['id']]) }}">Add to Cart</a></button>



            <p class="product-right-category">
                <span>Category :</span> Women, T-Shirt, crop-Top
            </p>
            <p class="product-right-category">
                <span>Tags:</span> Modern, Latest
            </p>
        </div>
    </div>
</body>


@endsection