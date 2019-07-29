<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo align-content-center justify-content-center">
    <a href="#" class="tx-success">
        <span class="tx-success tx-center font-weight-bold">Shop2Cart</span>
    </a>
</div>
<div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
    <div class="br-sideleft-menu">
        <a href="{{ url('/admin/home') }}" class="br-menu-link active">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div>
        </a>
        <a href="{{ url('/product') }}" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-book-outline tx-20"></i>
                <span class="menu-item-label">Products</span>
            </div>
        </a>

        <a href="{{ url('/customer') }}" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-people-outline tx-20"></i>
                <span class="menu-item-label">Customers</span>
            </div>
        </a>

        <a href="{{ url('/order') }}" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-android-cart tx-20"></i>
                <span class="menu-item-label">Orders</span>
            </div>
        </a>

        <a href="#" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-20"></i>
                <span class="menu-item-label">Settings</span>
            </div>
        </a>

        <a class="br-menu-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-power tx-18"></i>
                <span class="menu-item-label">Logout</span>
            </div>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    </div>

    <br>
</div>
<!-- ########## END: LEFT PANEL ########## -->
