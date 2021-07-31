<!-- Header -->
<header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <!-- search form -->
              <div class="search-form d-none d-lg-inline-block">
                 
              </div>

              <div class="navbar-right ">
                <ul class="nav navbar-nav">
                  <!-- User Account -->
                  <li class="dropdown user-menu">
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <img src="/admin/assets/img/user/user.png" class="user-image" alt="User Image" />
                      <span class="d-none d-lg-inline-block">Admin</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <!-- User image -->
                      <li class="dropdown-header">
                        <img src="/admin/assets/img/user/user.png" class="img-circle" alt="User Image" />
                        <div class="d-inline-block">
                          Admin <small class="pt-1">admin@example.com</small>
                        </div>
                      </li>

                      <li class="dropdown-footer">
                        <!-- <a href="{{ route('logout') }}"> <i class="mdi mdi-logout"></i> Log Out </a> -->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>


          </header>