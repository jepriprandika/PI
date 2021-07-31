    <!-- header start -->
    <header class="res-header-sm">
        <div class="header-top-wrapper">
            <div class="container">
                <div class="header-top">
                    <div class="header-info">
                        <span>Contact us - 087779991121 or <a href="#">shocap@gmail.com</a></span>
                    </div>
                    <div class="book-login-register">
                        <ul>
                            @guest
                            <li><a href="{{ url('login') }}"><i class="ti-user"></i>login</a></li>
                            <li><a href="{{ url('register') }}"><i class="ti-settings"></i>register</a></li>
                            @else
                            <li>Hello: <a href="{{ url('users/profile') }}">{{ Auth::user()->first_name }}</a></li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom clearfix">
            <div class="container">
                <div class="header-bottom-wrapper">
                    <div class="logo-2 ptb-40">
                        <a href="index.html">
                            <img src="{{ asset('themes/shocap/assets/img/av87d2a7f95222ecde19b-removebg-preview.png') }}" alt="">
                        </a>
                    </div>
                    <div class="menu-style-2 book-menu menu-hover">
                        <nav>
                            <ul>
                                <li><a href="#">home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="{{ url('services') }}">Service</a>
                                <li><a href="contact.html">contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-cart-4 furits-cart">
                        <a class="icon-cart" href="{{ url('carts') }}">
                            <i class="pe-7s-shopbag"></i>
                            <span class="handicraft-count">{{ \Cart::getTotalQuantity() }}</span>
                        </a>
                        @if (!\Cart::isEmpty())
                        <ul class="cart-dropdown">
                            @foreach (\Cart::getContent() as $item)
                                @php
                                    $service = isset($item->associatedModel->parent) ? $item->associatedModel->parent : $item->associatedModel;
                                    $image = !empty($service->serviceImages->first()) ? asset('storage/'.$service->serviceImages->first()->path) : asset('themes/shocap/assets/img/cart/3.jpg')
                                @endphp
                                <li class="single-product-cart">
                                    <div class="cart-img">
                                        <a href="{{ url('service/'. $service->slug) }}"><img src="{{ $image }}" alt="{{ $service->name }}" style="width:100px"></a>
                                    </div>
                                    <div class="cart-title">
                                        <h5><a href="{{ url('service/'. $service->slug) }}">{{ $item->name }}</a></h5>
                                        <span>{{ number_format($item->price) }} x {{ $item->quantity }}</span>
                                    </div>
                                    <div class="cart-delete">
                                        <a href="{{ url('carts/remove/'. $item->id)}}" class="delete"><i class="ti-trash"></i></a>
                                    </div>
                                </li>
                            @endforeach
                            <li class="cart-space">
                                <div class="cart-sub">
                                    <h4>Subtotal</h4>
                                </div>
                                <div class="cart-price">
                                    <h4>{{ number_format(\Cart::getSubTotal()) }}</h4>
                                </div>
                            </li>
                            <li class="cart-btn-wrapper">
                                <a class="cart-btn btn-hover" href="{{ url('carts') }}">view cart</a>
                                <a class="cart-btn btn-hover" href="{{ url('orders/checkout') }}">checkout</a>
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul class="menu-overflow">
                                    <li><a href="#">HOME</a>
                                        <ul>
                                            <li><a href="index.html">Fashion</a></li>
                                            <li><a href="index-fashion-2.html">Fashion style 2</a></li>
                                            <li><a href="index-fruits.html">Fruits</a></li>
                                            <li><a href="index-book.html">book</a></li>
                                            <li><a href="index-electronics.html">electronics</a></li>
                                            <li><a href="index-electronics-2.html">electronics style 2</a></li>
                                            <li><a href="index-food.html">food & drink</a></li>
                                            <li><a href="index-furniture.html">furniture</a></li>
                                            <li><a href="index-handicraft.html">handicraft</a></li>
                                            <li><a href="index-smart-watch.html">smart watch</a></li>
                                            <li><a href="index-sports.html">sports</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">pages</a>
                                        <ul>
                                            <li><a href="about-us.html">about us</a></li>
                                            <li><a href="menu-list.html">menu list</a></li>
                                            <li><a href="login.html">login</a></li>
                                            <li><a href="register.html">register</a></li>
                                            <li><a href="cart.html">cart page</a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                            <li><a href="wishlist.html">wishlist</a></li>
                                            <li><a href="contact.html">contact</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">shop</a>
                                        <ul>
                                            <li><a href="shop-grid-2-col.html"> grid 2 column</a></li>
                                            <li><a href="shop-grid-3-col.html"> grid 3 column</a></li>
                                            <li><a href="shop.html">grid 4 column</a></li>
                                            <li><a href="shop-grid-box.html">grid box style</a></li>
                                            <li><a href="shop-list-1-col.html"> list 1 column</a></li>
                                            <li><a href="shop-list-2-col.html">list 2 column</a></li>
                                            <li><a href="shop-list-box.html">list box style</a></li>
                                            <li><a href="product-details.html">tab style 1</a></li>
                                            <li><a href="product-details-2.html">tab style 2</a></li>
                                            <li><a href="product-details-3.html"> tab style 3</a></li>
                                            <li><a href="product-details-4.html">sticky style</a></li>
                                            <li><a href="product-details-5.html">sticky style 2</a></li>
                                            <li><a href="product-details-6.html">gallery style</a></li>
                                            <li><a href="product-details-7.html">gallery style 2</a></li>
                                            <li><a href="product-details-8.html">fixed image style</a></li>
                                            <li><a href="product-details-9.html">fixed image style 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">BLOG</a>
                                        <ul>
                                            <li><a href="blog.html">blog 3 colunm</a></li>
                                            <li><a href="blog-2-col.html">blog 2 colunm</a></li>
                                            <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                            <li><a href="blog-details.html">blog details</a></li>
                                            <li><a href="blog-details-sidebar.html">blog details 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html"> Contact </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->