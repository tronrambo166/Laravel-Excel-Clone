
<div class="headerbar">

  <!-- LOGO -->
  <div class="headerbar-left">
    <a href="" class="logo"><img alt="Logo" src="{!! asset('public/admin/assets/images/logo.png') !!}" /> <span></span></a>
  </div>

  <nav class="navbar-custom">

    <ul class="list-inline float-right mb-0">
     
      <li class="list-inline-item dropdown notif">
        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
          <img src="{!! asset('images/user.png') !!}" alt="Profile image" class="avatar-rounded">
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
          <!-- item-->
          <div class="dropdown-item noti-title"> @php $user=DB::table('users')->where('email', Session::get('user_id'))->get(); @endphp
            <h5 class="text-overflow"><small>Hello, @foreach($user as $u) {{$u->name}} @endforeach</small> </h5>
          </div>

         

          <a href="{{route ('logout')}} " class="dropdown-item notify-item" >
          <i class="fa fa-power-off"></i> <span> Logout </span>
        </a>
        <form id="logout-form" action="" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>

  </ul>

  <ul class="list-inline menu-left mb-0">
    <li class="float-left">
      <button class="button-menu-mobile open-left" style="margin-right: 0px;">
        <i class="fa fa-fw fa-bars"></i>
      </button>
    </li>
  </ul>

</nav>

</div>
