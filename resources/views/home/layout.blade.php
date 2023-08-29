<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('images/LogoKainKu/Logo-KainKu.png')}}" type="">
      <title>Kainku</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         <!-- untuk menampilkan pesan atau error jika ada -->
         @if (session('pesan'))
            <div class="alert alert-success">
               {{ session('pesan') }}
            </div>
         @endif

         @if (session('error'))
            <div class="alert alert-danger">
               {{ session('error') }}
            </div>
         @endif
         <!-- header section strats -->

        @yield('content')
      
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->

      <!-- Page Content  -->
  <div id="content" class="p-4 p-md-5 pt-5"> <!-- wajib pakai -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ session('error') }}
            </div>
        @endif
      </div> <!-- wajib pakai -->
    </div> <!-- wajib pakai -->

      <!-- jQery -->
      <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('home/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('home/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('home/js/custom.js')}}"></script>
   </body>
</html>