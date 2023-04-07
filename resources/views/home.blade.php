<!DOCTYPE html>
<html lang="en">
<head>
  <base href="{{asset('')}}">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alkatra&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/app.css"> 
  <link rel="stylesheet" href="css/reset.css"> 
</head>
<body>
@extends('app')
@section('content')
@auth
<p><b>{{ Auth::user()->name }}</b></p>
@endauth
@endsection


<main class="main">


  <div class="header">
    <div class="header-top">
    <img src="image/product/soundcloud-logo.svg" alt="Logo-Soundcloud" class="header-logo">
    </div>
    <div class="header-action"> 
      <a href="{{ route('login') }}" class ="btn-signin">Sign In</a>
      <a href="{{ route('register') }}" class=" btn-create">Create account</a>
  </div>
</div>




<div class="desc">
  <p>Hear what is trending for free in the SoundCloud community</p>
</div>  
 
<!-- <div class="list-product-subtitle">

  <p>List product description</p>

</div> -->
<div>
<form method="GET"  action="{{asset('search/')}}" class="search-bar">
  
  <input type="search" name="keyword" pattern=".*\S.*" required>
  <button class="search-btn" type="submit" href="http://127.0.0.1:8000/product/show/15">
    <span>Search</span>
  </button>
</form>
</div>


<div class="product-group">

  <div class="row">

  @foreach($products as $key => $product)

      <div class="col-md-3 col-sm-6 col-12">

        <div class="card card-product mb-3">

<img src="{{ asset('image/product/'.$product->product_image) }}" alt=""  class="images-detail img" >

<div class="card-body">

      <h5 class="card-title">{{ $product->name }}</h5>

      <p class="card-text">{{ $product->price }}</p>

      <a class="btn btn-info" href="{{ route('products.show',$product->product_id) }}">Show</a>
    

</div>

<audio controls controlsList="nodownload" style="width: 250px;" ontimeupdate="myAudio(this)" class="audio">
                <source src="{{ asset('audio/product/'.$product->audio) }}" type="audio/mpeg" >
                </audio>
                <script type="text/javascript">
                    function myAudio(event){
                        if(event.currentTime>10){
                            event.currentTime=0;
                            event.pause();
                            alert("Bạn phải trả phí để nghe cả bài")
                        }
                    }
                </script>

                


        </div>
            <div class="form-group">
                <strong>Details:</strong>
                {{ $product->product_description }}
            </div>
           

</div>

@endforeach

</div>

</div>


<!-- <div>
</div> -->

  
</main>





<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify"> Soundcloud <i>Welcome to the music site! Here you can search and play music from millions of songs from various genres. With a simple and easy-to-use interface, the music player website will give you a great music enjoyment experience. Try it and feel it today!</p>
          </div>

        

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/about/">About Us</a></li>
              <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
              <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
              <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
              <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">SOUNDCLOUD.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>








</body>
</html>