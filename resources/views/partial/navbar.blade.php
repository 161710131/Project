<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
    <div class="navbar-nav ">
       <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
        </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>

  