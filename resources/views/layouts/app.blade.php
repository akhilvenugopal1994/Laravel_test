<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <!-- Title -->
      <title>Project</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Meta description -->
     
      <!-- CSS -->
      <link href="{{ asset('assets/dist/css/main.css') }}" rel="stylesheet" type="text/css">
      <!-- Favicon -->
      <link rel="icon" type="image/png" href="{{ asset('assets/dist/img/favicon.ico') }}">
   </head>
    
    <!-- body start -->
   <body>
      <header>
         <div class="container"> 
            <div class="row">
               <div class="col-lg-12 col-12 text-center">
                  <img src="{{ asset('assets/dist/img/logo.png') }}" alt="">
               </div>
            </div>
         </div>
      </header>
       
       @yield('content')
       
       <footer>
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-12"> 
                  <h5>Lorem Ipsum is simply dummy text</h5>
                  <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                  <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  <p>Copyright@2022</p>
               </div>
            </div>
         </div>
      </footer>

      <script src="{{ asset('assets/dist/js/app.js') }}"></script>
      @yield('scripts')
   </body>
    <!--body end -->
    
</html>