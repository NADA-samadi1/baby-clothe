<link rel="stylesheet" href="{{ asset('css/Style.css') }}">
@extends('Master_page')
@section('title', 'Home')
@section('content')

<header class="header">
    <div class="container header_container">
      <div class="header_filter">
        <a href="#" class="header_filter_link">Boys’s Fashion</a>
        <a href="#" class="header_filter_link">Girls’s Fashion</a>
        <a href="#" class="header_filter_link">Summer collection</a>
        <a href="#" class="header_filter_link">Home collection</a>
        <a href="#" class="header_filter_link">Winter collection</a>
        <a href="#" class="header_filter_link">Sports </a>
        <a href="#" class="header_filter_link">Baby’s & Toys</a>
        <a href="#" class="header_filter_link">Groceries & Pets</a>
        <a href="#" class="header_filter_link"> Beauty baby</a>
      </div>
      <img src="{{ asset('imgs/photo3.jpg') }}" alt="" class="header_img" />
    </div>
  </header>
  <section class="section">
    <div class="container">
      <div class="section_category">
        <p class="section_category_p">Today's</p>
      </div>
      <div class="section_header">
        <h3 class="section_title">Flash Sale</h3>
        <p id="demo"></p>
      </div>
    </section>
    <div class=" ">
      {{-- Section with heading and pagination --}}
      <div class="part1">
        <h5 style="color: grey; text-align: center;font-size: 30px;font-family: 'Playfair Display', serif;">Our Store</h5>
        <h1 style="color: black; text-align: center;font-size: 40px;font-family: 'Playfair Display', serif; ">BOX SELECTION</h1>
      </div>
    
      {{-- Section for product display --}}
     <div class="part2 ">
        @foreach ($produits as $item )
          <div class="box p-0">
            {{-- Display product information (visible only on hover) --}}
            <div class="product-info">
              <p style="font-weight: 500;font-size: 20px;font-family: 'Playfair Display', serif;">{{ $item["titre"] }}</p>
              <p style="font-weight: 600;font-size: 20px;font-family: 'Playfair Display', serif;">{{ $item["prix"] }} DH</p>
              <button><i class="fa-solid fa-basket-shopping" id="icone"></i></button>
              {{-- <button> <a href="{{ route('show', $item->id) }}" style="color:#0b0b0b"><i class="fa-solid fa-arrow-right " id="icone"></i></a> </button> --}}
            </div>
            <img src="{{'imgs/'.$item['image'] }}" alt="{{ $item->name }}" class="">
          </div>
        @endforeach
      </div>
    
      {{-- Pagination links --}}
      {{ $produits->links('vendor\pagination\custom') }}
    
     
  </div>
    <script>
      // Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    // document.getElementById("demo").innerHTML = "demo";
  }
}, 1000);


document.addEventListener("DOMContentLoaded", function() {
       var productBoxes = document.querySelectorAll('.box');

        productBoxes.forEach(function(box) {
            box.addEventListener('mouseenter', function() {
                box.querySelector('.product-info').style.opacity = '1';
            });

        box.addEventListener('mouseleave', function() {
            box.querySelector('.product-info').style.opacity = '0';
        });
         });
        });
    </script>
@endsection
