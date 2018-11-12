<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ route('home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('category.index')}}"><i class="fa fa-edit fa-fw"></i> Categories</a>
            </li>
            <li>
                <a href="{{ route('brand.index')}}"><i class="fa fa-edit fa-fw"></i> {{ __('messages.brand') }}</a>
            </li>
            <li>
                <a href="{{ route('product.index')}}"><i class="fa fa-table fa-fw"></i> Products</a>
            </li>
            <li>
                <a href="{{ route('order.index')}}"><i class="fa fa-edit fa-fw"></i> Order</a>
            </li>
            <li>
                <a href="{{ route('payment_method.index')}}"><i class="fa fa-edit fa-fw"></i> Payment Methods</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->