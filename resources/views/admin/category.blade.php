<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')

   <style type ="text/css">
    .div_center
    {
        text-align: center;
        padding-top: 45px;
    }

    .h2_fonts
    {
        font-size: 40px;
        padding-bottom: 45px;
    }

    .input_color
    {
       color: black;
    }

   </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->


        <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
        <!-- partial -->

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="div_center">
                <h2 class="h2_font"> Add Products </h2>

                <form action="{{url('/add_category')}}" method="POST">

                    @csrf

                    <input class="input_color" type="text" name="name" placeholder="Write product name">
                    <input class="input_color" type="text" name="detail" placeholder="Write product detail">
                    <input class="input_color" type="text" name="low_price" placeholder="lowest estimated cost">
                    <input class="input_color" type="text" name="high_price" placeholder="highest estimate cost">

                    <input type="submit" class="btn btn-primary" name="submit" value="Add products"> 
                </form>
            </div>
          </div>
        </div>
        
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>