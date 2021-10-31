<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div><img src="assets/images/users/2.jpg" alt="user-img" class="img-circle"></div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Steave Gection <span class="caret"></span></a>
                    <div class="dropdown-menu animated flipInY">
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item logout-btn"><i class="fa fa-power-off"></i> Logout</a>
                        <!-- text-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">--- Crypto</li>
                <li> <a class="waves-effect waves-dark" href="{{ route('dashboard') }}" aria-expanded="false"><i class="icon-speedometer text-danger"></i><span class="hide-menu">Dashboard</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.investor.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Investor</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.investment.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Investment</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.investorContactPerson.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Contact Person</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.settlement.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Settlement</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.vendorInfo.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Vendor</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.carCategory.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Car Category</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.car.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Car</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.invoice.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Sales</span></a></li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Parent</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Ch 1 </a></li>
                        <li><a href="#">Ch 2</a></li>
                    </ul>
                </li>
               <li> <a class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Single</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
