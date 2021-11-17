<div class="ht-md-60 pd-x-50 bg-white d-flex" id="nav">
    <img src="{{ asset('img/cart.png') }}"  class="my-auto mr-4" width="50" height="50">
    <ul class="nav nav-outline flex-column flex-md-row" role="tablist">
        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Track your orders</a></li>
        @guest
            <li class="nav-item">
                <a href="{{ url('login') }}" class="nav-link">
                    <button class="btn btn-outline-secondary btn-sm" type="submit">Sign In</button>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('register') }}" class="nav-link">
                    <button class="btn btn-outline-secondary btn-sm" type="submit">Sign Up</button>
                </a>
            </li>
        @else
            <li class="nav-item">
                <a href="{{ auth()->user()->is_admin ? url('/admin/home') : url("/home")}}" class="nav-link">
                    {{ Auth::user()->name }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <button class="btn btn-outline-secondary btn-sm" type="submit">Logout</button>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest
        <li class="nav-item">
            <a class="nav-link"  href="{{ url('/product/shopping-cart') }}" data-toggle="tooltip" data-placement="top" title="Checkout item in cart">
                <i class="menu-item-icon icon ion-android-cart tx-20 mr-1"></i>
                <span class="badge badge-success cart" id="cart">
                    {{ session()->get('cart') ? session()->get('cart')->totalQty : 0 }}
                </span>
            </a>
        </li>
    </ul>
</div>
