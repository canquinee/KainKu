<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="index.html"><img src="{{asset('images/LogoKainKu/2.png')}}" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{asset('images/LogoKainKu/2.png')}}" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="admin/assets/images/faces/face15.jpg" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">{{ session('user')['data']['username'] }}</h5>
            @if(session('user')['data']['level'] == '2')
              <span>Super Admin</span>
            @elseif(session('user')['data']['level'] == '1')
              <span>Admin</span>
            @endif
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="{{ route('profile') }}" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('editProfilePassword') }}" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-onepassword  text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
            </div>
          </a>
          
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('dash') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('kain_list') }}">
        <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span>
        <span class="menu-title">Kain Collection</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('toko_list') }}">
        <span class="menu-icon">
          <i class="mdi mdi-contacts"></i>
        </span>
        <span class="menu-title">Toko List</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <span class="menu-icon">
          <i class="mdi mdi-security"></i>
        </span>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
        @if(session('user')['data']['level'] == '2')
          <li class="nav-item"> <a class="nav-link" href="{{ route('SA_List') }}"> Super Admin List </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('A_List') }}"> Admin List </a></li>
        @elseif(session('user')['data']['level'] == '1')
          <li class="nav-item"> <a class="nav-link" href="{{ route('A_List') }}"> Admin List </a></li>
        @endif
          <li class="nav-item"> <a class="nav-link" href="{{ route('U_List') }}"> User List </a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>