<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('home*') ? 'active' : '' }}" aria-current="page" href="/home">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          @can('pedagang')
          <li class="nav-item">
            <a class="nav-link {{ Request::is('order*') ? 'active' : '' }}" href="/order">
              <span data-feather="file" class="align-text-bottom"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('profile*') ? 'active' : '' }}" href="{{ asset('/profile/' . Auth::user()->id) }}">
              <span data-feather="user" class="align-text-bottom"></span>
              Profile
            </a>
          </li>
          @endcan
          @can('admin')
          <h6 class="sidebar-heading d-flex justifi-content-between align-items-center px-3 mt-4 mb-1 text muted">
            <span>Administrator</span>
          </h6>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('pesanan*') ? 'active' : '' }}" href="/pesanan">
                <span data-feather="file" class="align-text-bottom"></span>
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('reports*') ? 'active' : '' }}" href="/reports">
                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                Reports
              </a>
            </li>
          </ul>
          @endcan
          <li class="nav-item">
              <form action="/logout" method="post" class="nav-link">
                @csrf
                <button style="border: 0;">
                  <span data-feather="log-out" class="align-text-bottom"></span>
                  Logout
                </button>
              </form>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/profiles') ? 'active' : '' }}" href="/dashboard/profiles">
              <span data-feather="user" class="align-text-bottom"></span>
              Profile
            </a>
          </li> -->
        </ul>
      </div>
    </nav>