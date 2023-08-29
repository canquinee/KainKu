<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
      table {
         border-collapse: collapse; /* Merge borders into a single line */
         border: 1px solid white; /* Set border color to white */
      }

      th, td {
         border: 1px solid white; /* Set border color to white */
         padding: 3px; /* Add padding for better spacing */
         text-align: center;
      }
      .action-cell {
        width: 100px; /* Set the width for the Action column */
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

        <!-- partial:partials/_body.html -->
        <div class="main-panel">
        <!-- untuk menampilkan pesan atau error jika ada -->
            @if (session('pesan'))
               <div class="alert alert-success">
                  {{ session('pesan') }}
               </div>
            @elseif (session('error'))
               <div class="alert alert-danger">
                  {{ session('error') }}
               </div>
            @endif
            @yield('content')
        </div>
        <!-- partial -->

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script') 
    <!-- End custom js for this page -->
  </body>
</html>