<header id="header" class="site-header header-scrolled position-fixed text-black bg-light">
      <nav id="header-nav" class="navbar navbar-expand-lg px-3 mb-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset('front-end-assets/assets')}}/images/main-logo.png" class="logo">
          </a>
          <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <svg class="navbar-icon">
              <use xlink:href="#navbar-icon"></use>
            </svg>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
            <div class="offcanvas-header px-4 pb-0">
              <a class="navbar-brand" href="index.html">
                <img src="{{asset('front-end-assets/assets')}}/images/main-logo.png" class="logo">
              </a>
              <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
            </div>
            <div class="offcanvas-body">
              <ul id="navbar" class="navbar-nav text-uppercase justify-content-end align-items-center flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link me-4 active" href="#billboard">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-4" href="#mobile-products">Phones</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-4" href="#smart-watches">Watches</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-4" href="#air-buds">Airbuds</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-4" href="#latest-blog">Blog</a>
                </li>

                <li class="nav-item">
                  <div class="user-items ps-5">
                    <ul class="d-flex justify-content-end list-unstyled">
                      <li class="search-item pe-3">
                        <a href="#" class="search-button">
                          <svg class="search">
                            <use xlink:href="#search"></use>
                          </svg>
                        </a>
                      </li>

                      <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                          <svg class="cart">
                              <use xlink:href="#user"></use>
                                </svg> <svg class="user">
                                  <use xlink:href="user"></use>
                                </svg>
                        </a>
                        <ul class="dropdown-menu">
                        @if(Session::get('customerId'))
                          <li class="dropdown-item bold">{{Session::get('customerName')}}</li>
                            <hr>
                          <li>
                            <a href="{{route('customer.edit', ['id'=>Session::get('customerId')])}}" class="dropdown-item">Edit Profile</a>
                            <a href="{{route('customer.orderlist', ['id'=>Session::get('customerId')])}}" class="dropdown-item">My Order</a>
                            <a href="{{route('customer.logout')}}" class="dropdown-item">Logout</a>
                          </li>
                         @else                                         
                            <li><a href="{{ route('customer.login') }}" class="dropdown-item">Login</a></li>
                            <li><a href="{{ route('customer.singup') }}" class="dropdown-item">Sing Up</a></li>                                        
                          @endif
                        </ul>
                      </li>                                

                      <li>
                        <a href="cart.html">
                          <svg class="cart">
                            <use xlink:href="#cart"></use>
                          </svg>
                        </a>
                      </li>

                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>