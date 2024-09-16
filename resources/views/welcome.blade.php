@extends('/layout/app')
@section('content')



<section class='product-section'>
  <div class='page-width'>
    <div class="row">    
      <div class="col-right">
        <!-- Product Section -->
        <h2>Best Sellers
        </h2>
        <p>From your tried-and-true national brands to the difficult to find specialty lenses, we’ve got you covered. Order now and enjoy low prices, quality customer service, and the convenience of ordering from your home or office any time, seven days a week.
        </p>
        <div class="best-sellers-grid "> <!-- Add slick-slider class here -->
          @foreach ($products as $id=>$product )
             
       
          <div class="product">
              <a href="{{ url('/product/' . $product->id ) }}">
                
                <img src="{{ asset('storage/' . $product->image) }}" >
                <div class='price-product'>
                  <p>Our Price</p>
                  <span class='price-item price-item--regular'>$ {{$product->price}}</span>
                </div>
                <h3>{{$product->product_title}}</h3>
              </a>
            </div>
            @endforeach
         
        </div>
      </div>
    </div>  
  </div>
</section>



<div class='icon-with-text'>
  <div class='page-width'>
    <div class='row'>
  
      <div class='col'>
      <div class='icon-img'>
        <img src='https://globallens.ca/cdn/shop/files/Group_37_2.png?v=1709322993' />
      </div>
        <div class='icon-text'><span>Discount Prices On All Contact Lenses
        </span></div>
        
      </div>

      <div class='col'>
        <div class='icon-img'>
          <img src="https://globallens.ca/cdn/shop/files/Group_38.png?v=1709323029" />
        </div>
          <div class='icon-text'><span>100% Satisfaction Guaranteed

          </span></div>
          
        </div>

        <div class='col'>
          <div class='icon-img'>
            <img src="https://globallens.ca/cdn/shop/files/Group_39.png?v=1709323067" />
          </div>
            <div class='icon-text'><span>Monday - Friday: 8:30am-5pm Est

            </span></div>
            
          </div>
          <div class='col'>
            <div class='icon-img'>
              <img src="https://globallens.ca/cdn/shop/files/Group_40.png?v=1709323082" />
            </div>
              <div class='icon-text'><span>Reordering is Always Quick & Simple

  
              </span></div>
              
            </div>
      
      
    </div>
    
  </div>
</div>

<style>
  .icon-with-text {
    margin-top: 30px;
}

</style>

<div class='testimonial-section'>
    <div class='page-width'>
      <div class='row'>
      <div class='testimonial-section-heading'>
       Check out our <span>Reviews!</span>
      </div>
      <div class='testimonial-section-para'>
        <p>Because when it comes to eyes, people trust us.</p>
      </div>
  </div>
         
     <div class='slideshow-slick-saf'>
          <div class='testimonial-slider'>
        
          <div class='testimonial-card'>
            <div class='trust-piolet-image'>
             <img src='https://cdn.shopify.com/s/files/1/0802/0262/9403/files/Trustpilot_2.png?v=1711653378' />
           </div> 
           <div class='testimonial-review'><p>“First time using Global Lens, will definitely be a repeat customer! After getting a shipping notification, my contacts arrived even sooner than I thought. Contacts feel great, no problems with dry itchy eyes!”</p></div>
           <div class='testimonial-customer'>
             <div class='testimonial-customer-image'>
               <img src="https://globallens.ca/cdn/shop/files/Image_1.png?v=1709325109" />
             </div>
             <div class='testimonial-customer-name'><p>Jon Kroeger</p></div>
           </div>
         </div>
         <div class='testimonial-card'>
            <div class='trust-piolet-image'>
             <img src='https://cdn.shopify.com/s/files/1/0802/0262/9403/files/Trustpilot_2.png?v=1711653378' />
           </div> 
           <div class='testimonial-review'>
            <p>“I have been buying my contacts here for many years it's always quick and easy and I've never had any problems Any Questions I had were answered quickly.”</p></div>
           <div class='testimonial-customer'>
             <div class='testimonial-customer-image'>
               <img src="https://globallens.ca/cdn/shop/files/Image_2.png?v=1709325173" />
             </div>
             <div class='testimonial-customer-name'><p>Miriah Hickmott</p></div>
           </div>
         </div>
         <div class='testimonial-card'>
            <div class='trust-piolet-image'>
             <img src='https://cdn.shopify.com/s/files/1/0802/0262/9403/files/Trustpilot_2.png?v=1711653378' />
           </div> 
           <div class='testimonial-review'>
            <p>Global Lens’ service is amazing, and my contacts were received ahead of schedule! I can get exactly what I need, without shipping costs....</p></div>
           <div class='testimonial-customer'>
             <div class='testimonial-customer-image'>
               <img src="https://globallens.ca/cdn/shop/files/Image.png?v=1709324964" />
             </div>
             <div class='testimonial-customer-name'><p>Tammy Lanier</p></div>
           </div>
         </div>
        
      </div>
          </div>
          
    </div>

  </div>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  $(document).ready(() => {
      $('.slideshow-slick-saf .testimonial-slider').slick({
          autoplay: false,
          autoplaySpeed: 800, 
          dots: false,
          slidesToShow: 3,
          nextArrow:"<button type='button' class='slick-next pull-right'>Next Testimonial</button>",
        responsive: [
        
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
             
          }
        },
          {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
      });
  });
  
    </script>

    @endsection