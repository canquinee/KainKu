<header class="header_section">
   <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
         <a class="navbar-brand" href="index.html"><img width="250" src="{{asset('images/LogoKainKu/1.png')}}" alt="#" /></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class=""> </span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
               <li class="nav-item active">
                  <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="about.html">About</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('products') }}">Products</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="blog_list.html">Store</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact Us</a>
               </li>

               <form class="form-inline">
                  <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
               </form>

               @if (session('user'))
               <li class="nav-item">
                     <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" id="logoutcss" class="btn btn-dark">
                        {{ __('Log Out') }}
                        </button>
                     </form>
               </li>
               <li class="nav-item">
                     <form method="GET" action="{{ route('profile') }}" class="inline">
                        @csrf
                        <button type="submit" class="btn  my-2 my-sm-0 nav_search-btn">
                        <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                        </button>
                     </form>
               </li>
               @else
               <li class="nav-item">
                  <a class="btn btn-danger" id="logincss" href="{{ route('login') }}">Login</a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-secondary" href="{{ route('register') }}">Register</a>
               </li>
               @endif

            </ul>
         </div>
      </nav>
   </div>
</header>