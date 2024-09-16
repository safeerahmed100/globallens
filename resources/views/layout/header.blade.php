<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <link rel="stylesheet" href="{{url('assets/base.css')}}">
    <link rel="stylesheet" href="{{url('assets/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
  
    <title>Global Lens</title>
</head>
<body>
<section id='header'>
    <div class="container" style='max-width:1400px!important  ' bis_skin_checked="1">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 ">
          <div class="col-md-2 mb-2 mb-md-0" bis_skin_checked="1">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
              <img src='https://globallens.ca/cdn/shop/files/Global_lens_1.png?v=1709320225&width=140'>
            </a>
          </div>
    
          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 text-color-white">
            <li><a href="#" class="nav-link px-2 ">Lens Type</a></li>
            <li><a href="#" class="nav-link px-2">Popular Brands</a></li>
            <li><a href="#" class="nav-link px-2">Contact</a></li>
          </ul>
    
          <div class="col-md-3 text-end" bis_skin_checked="1">
            
            {{-- <a href={{route('vendor.signup')}} class='text-light signin_btn hoverBtn'>Vender Signup</a> --}}

          </div>
          <div class="col-md-2 text-end" bis_skin_checked="1">
            
           

            @if(!Auth::user())
              <a href={{route('login')}}  class="text-light signin_btn hoverBtn">Sign in</a>
            
            @elseif ($isAdmin = Auth::user() && $isAdmin = Auth::user()->is_admin)
              <a href={{route('admin.dashboard')}}  class="text-light signin_btn hoverBtn">Dashboard</a>
            
            @else
              <a href={{route('logout')}}  class="text-light signin_btn hoverBtn">Logout</a>
            @endif
          </div>
          <div class='col-md-1 col-1'>
            <a href={{route('cart.show')}}>
              <span id='cart-count'></span>
            <svg class="icon icon-cart-empty" width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.60286 32C8.7226 32 7.96931 31.6869 7.34299 31.0608C6.7156 30.4336 6.40191 29.68 6.40191 28.8C6.40191 27.92 6.7156 27.1664 7.34299 26.5392C7.96931 25.9131 8.7226 25.6 9.60286 25.6C10.4831 25.6 11.2364 25.9131 11.8627 26.5392C12.4901 27.1664 12.8038 27.92 12.8038 28.8C12.8038 29.68 12.4901 30.4336 11.8627 31.0608C11.2364 31.6869 10.4831 32 9.60286 32ZM25.6076 32C24.7274 32 23.9741 31.6869 23.3477 31.0608C22.7204 30.4336 22.4067 29.68 22.4067 28.8C22.4067 27.92 22.7204 27.1664 23.3477 26.5392C23.9741 25.9131 24.7274 25.6 25.6076 25.6C26.4879 25.6 27.2417 25.9131 27.8691 26.5392C28.4954 27.1664 28.8086 27.92 28.8086 28.8C28.8086 29.68 28.4954 30.4336 27.8691 31.0608C27.2417 31.6869 26.4879 32 25.6076 32ZM8.24245 6.4L12.0836 14.4H23.2869L27.6882 6.4H8.24245ZM9.60286 24C8.4025 24 7.49556 23.4731 6.88205 22.4192C6.26853 21.3664 6.24186 20.32 6.80202 19.28L8.96267 15.36L3.20095 3.2H1.56046C1.107 3.2 0.733552 3.0464 0.440131 2.7392C0.14671 2.43307 0 2.05333 0 1.6C0 1.14667 0.153646 0.7664 0.460937 0.4592C0.767162 0.153067 1.14701 0 1.60048 0H4.20125C4.49467 0 4.77475 0.0800002 5.0415 0.24C5.30825 0.4 5.50831 0.626667 5.64168 0.92L6.722 3.2H30.329C31.0492 3.2 31.5427 3.46667 31.8095 4C32.0762 4.53333 32.0629 5.09333 31.7695 5.68L26.0878 15.92C25.7943 16.4533 25.4076 16.8667 24.9274 17.16C24.4473 17.4533 23.9004 17.6 23.2869 17.6H11.3634L9.60286 20.8H27.2481C27.7016 20.8 28.075 20.9531 28.3684 21.2592C28.6619 21.5664 28.8086 21.9467 28.8086 22.4C28.8086 22.8533 28.6549 23.2331 28.3476 23.5392C28.0414 23.8464 27.6616 24 27.2081 24H9.60286Z" fill="#040404"></path>
                </svg>
              </a>
          </div>
        </header>
      </div>
    </section>

    <script>
      document.addEventListener('DOMContentLoaded', () => {
          // Call the function to get cart count on page load
          fetchCartCount();
      });
  
      function fetchCartCount() {
          const url = '/cart/count';
          fetch(url)
              .then(response => {
                  return response.json();  // Parse JSON response
              })
              .then(response => {
                  document.getElementById('cart-count').innerText = response.cartCount;
                    // Update cart icon count
              })
              .catch(error => {
                  console.error('Error fetching cart count:', error);  // Handle any errors
              });
      }
  </script>