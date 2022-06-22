<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('pedagang') ? 'active' : '' }}" aria-current="page" href="/pedagang">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('order') ? 'active' : '' }}" href="/order">
              <span data-feather="file" class="align-text-bottom"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="/profile">
              <span data-feather="user" class="align-text-bottom"></span>
              Profile
            </a>
          </li>
          <li class="nav-item">
              <form action="/logout" method="post" class="nav-link">
                @csrf
                <button style="border: 0;">
                  <span data-feather="log-out" class="align-text-bottom"></span>
                  Logout
                </button>
              </form>
          </li>
        </ul>
      </div>
    </nav>