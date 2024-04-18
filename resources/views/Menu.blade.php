

  {{-- <link rel="stylesheet" href="{{ asset('css/Menu.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">

  <body>
   <div class="nav">
    <a class="logo" href="/">
        <img src="{{ asset('imgs/bloom-removebg-preview.png') }}" alt="" srcset="">
    </a>
    <div class="navbar-toggler" type="button" id="bar">
        <span class="toggler-icone"></span>
        <span class="toggler-icone"></span>
        <span class="toggler-icone"></span>
    </div>
    <div class="menu-bar">
        <ul class="menu-item">
            <li><a href="/produitsr/Homme">Boys</a></li>
            <li><a href="/produitsr/Femme">Girls</a></li>
            @if(Auth::user())
            @if(Auth::user()->role==='ADMIN')
            <li><a href="{{ route('create') }}">Ajouter</a></li>
            <li><a href="/espaceadmin">Mise a jour</a></li>
            @endif
            @if(Auth::user()->role==='USER')
            <li><a href="/espaceclient">Espace Client</a></li>
            @endif
        </ul>
    </div>
    <div class="navbar-soscial">
    
    <ul class="icones">
        <form action="/logout" method="POST">
            @csrf
            
            <button type="submit" class="btn" href="/logout"><li><a href=""><i class="fa-solid fa-right-from-bracket"></i></a></li></button>
        </form>
        @else

        <li><a href="/login"><i class="fa-solid fa-user"></i></a></li>
            <!-- User is not authenticated -->
            
           <li> <a class="" href="/register">S'inscrire</a></li>
        @endif
        
    </ul>
</div>
    </div> 
 
<div class="overlay"></div>
<div class="hero-shape">
   
</div>
 </div>
 
  
</body>  --}}


<link
rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/Menu.css') }}" />
<title>Home - Exclusive E-Commerce Website</title>
</head>
<body>
<div class="top_nav">
<div class="container top_nav_container">
  <div class="top_nav_wrapper">
    <p class="tap_nav_p">
      Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%!
    </p>
    <a href="#" class="top_nav_link">SHOP NOW</a>
  </div>
</div>
</div>
<nav class="nav">
<div class="container nav_container">
  <a href="#" class="nav_logo">BABY SHOP</a>
  <ul class="nav_list">
    <li class="nav_item"><a href="/" class="nav_link">Home</a></li>
    <li class="nav_item"><a href="/produitsr/Homme" class="nav_link">Boys</a></li>
    <li class="nav_item"><a href="/produitsr/Femme" class="nav_link">Girls</a></li>
    @if(Auth::user())
    @if(Auth::user()->role==='ADMIN')
    <li class="nav_item"><a href="{{ route('create') }}" class="nav_link">Ajouter</a></li>
    <li class="nav_item"><a href="/espaceadmin" class="nav_link">mis a jour</a></li>
    <li class="nav_item"><a href="/email" class="nav_link">Send email</a></li>
    @endif
    @if(Auth::user()->role==='USER')
    <li class="nav_item"><a href="/espaceclient" class="nav_link">Mine</a></li>
    @endif
    {{-- <li class="nav_item">
      <a href="/sign-up.html" class="nav_link">Sign up</a>
    </li> --}}
    @else
    <li class="nav_item"><a href="/login" class="nav_link">login</a></li>
    
        <!-- User is not authenticated -->
        <li class="nav_item"><a href="/register" class="nav_link">registrer</a></li>
       
    @endif
  </ul>
  <div class="nav_items">
    <form action="#" class="nav_form">
      <input
        type="text"
        class="nav_input"
        placeholder="search here...." />
      <img src="{{ asset('imgs/search.png') }}" alt="" class="nav_search" />
    </form>
    <img src="{{ asset('imgs/icone-heart.png') }}" alt="" class="nav_heart" />
    <a href="{{ route('cart') }}">
      <img src="{{ asset('imgs/card-icone.jpg') }}" alt="" class="nav_cart" />
      <span class="carde bg-light"> {{ count(array(session('cart'))) }}</span>
    </a>
    <form action="/logout" method="POST">
        @csrf
        
        <button type="submit" class="btn btn-light" href="/logout"> 
            <img src="{{ asset('imgs/logout.png') }}" alt="" class="nav_logout" />
          </a></button>
    </form>

   
  </div>

</nav>
<div class="container mt-4">
  @if(session('success'))
  <div class="alert alert-success">
{{ session('success') }}
  </div>
  @endif
</div>




 
