@php
$configData = Helper::applClasses();
@endphp
<div class="main-menu menu-fixed {{(($configData['theme'] === 'dark') || ($configData['theme'] === 'semi-dark')) ? 'menu-dark' : 'menu-light'}} menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item mr-auto">
        <a class="navbar-brand" href="{{url('/')}}">
          <h2 class="brand-text" style="font-size: 1rem;">Sistem Informasi <br> Pengelolaan Limbah <br> Sisa Makanan Tilo Organizer</h2>
        </a>
      </li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content mt-2">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      {{-- Foreach menu item starts --}}
      @if(isset($menuData[0]))
      @foreach($menuData[0]->menu as $menu)
      @if(isset($menu->navheader))
      <li class="navigation-header">
        <span>{{ __($menu->navheader) }}</span>
        <i data-feather="more-horizontal"></i>
      </li>
      @else
      {{-- Add Custom Class with nav-item --}}
      @php
      $custom_classes = "";
      if(isset($menu->classlist)) {
      $custom_classes = $menu->classlist;
      }
      @endphp
      <li class="nav-item {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }} {{ $custom_classes }}">
        <a href="{{isset($menu->url)? url($menu->url):'javascript:void(0)'}}" class="d-flex align-items-center" target="{{isset($menu->newTab) ? '_blank':'_self'}}">
          <i data-feather="{{ $menu->icon }}"></i>
          <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
          @if (isset($menu->badge))
          <?php $badgeClasses = "badge badge-pill badge-light-primary ml-auto mr-1" ?>
          <span class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }} ">{{$menu->badge}}</span>
          @endif
        </a>
        @if(isset($menu->submenu))
        @include('panels/submenu', ['menu' => $menu->submenu])
        @endif
      </li>
      @endif
      @endforeach
      @endif
      {{-- Foreach menu item ends --}}
    </ul>
  </div>
</div>
<!-- END: Main Menu-->
