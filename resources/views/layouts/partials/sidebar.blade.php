 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
 <div class="left main-sidebar">

  <div class="sidebar-inner leftscroll">

    <div id="sidebar-menu" class=" show">

      <ul class=" show">

        {{--<li class="submenu">
          <a class="" href="{{ route('admin.home') }}"><i class="fa fa-fw fa-dashboard"></i><span> {{ __('admin.dashboard') }} </span> </a>
        </li> --}}
{{--
        @php
          // retrieve all menus for authenticated user
          $role_wise_menus = \App\Models\Role::where('role', Auth()->guard('admin')->user()->admin_role)->first();
          // decode menus and submenus
          $role_menus = json_decode($role_wise_menus->menu);
          $role_sub_menus = json_decode($role_wise_menus->sub_menu);
        @endphp
        @php
            // retrieve row for the menu_id
            $menus = \App\Models\Menu::whereNull('parent_id')->orderBy('order')->get();
            $menu_statuses = \App\Models\MenuStatus::all()->keyBy('menu_id')->toArray();
            $menu_statuses = (!empty($menu_statuses) ? array_map(function($item) { return $item['status']; }, $menu_statuses) : array());
        @endphp
        @if(!$menus->isEmpty())
            @foreach($menus as $menu)
				@if(in_array($menu->id,$role_menus)) 
					if it is the menu (not submenu)
					@if(is_null($menu->parent_id)) --}}
						
				
        <li class="submenu open">
          <a href="#" class=""><i class="fa fa-fw fa-bars"></i> <span> {{ "Menu" }} </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled">
          	<li><a href="" class="">{{ 'Home' }}</a></li>
            <li><a href="" class="">{{ 'Add Member' }} </a></li>
            <li><a href="" class="">{{ 'Members' }}</a></li>
            <li><a href="" class="">{{ 'Plans/Packages' }}</a></li>
            <li><a href="" class="">{{ 'Trainers' }}</a></li>
            <li><a href="" class="">{{ 'Users' }}</a></li>
          </ul>
        </li>
       

      </ul>

      <div class="clearfix"></div>

    </div>

    <div class="clearfix"></div>

  </div>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
       
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
