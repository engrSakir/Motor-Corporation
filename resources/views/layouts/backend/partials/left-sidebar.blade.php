<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div><img src="{{ asset(auth()->user()->image ?? 'assets/images/users/2.jpg') }}" alt="user-img" class="img-circle"></div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                    <div class="dropdown-menu animated flipInY">
                        <!-- text-->
                        <a href="{{ route('backend.profile') }}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                        <!-- text-->

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
                <li> <a class="waves-effect waves-dark" href="{{ route('dashboard') }}" aria-expanded="false"><i class="icon-speedometer text-danger"></i><span class="hide-menu">Dashboard</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.investment.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Investment</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.vendorInfo.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Vendor</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.car.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Car</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.customer') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Customer</span></a></li>
                <!-- <li> <a class="waves-effect waves-dark" href="{{ route('backend.investorContactPerson.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Contact Person</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.settlement.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Settlement</span></a></li>
               <li> <a class="waves-effect waves-dark" href="{{ route('backend.carCategory.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Car Category</span></a></li>-->
                {{-- <li> <a class="waves-effect waves-dark" href="{{ route('backend.purchaseOrder.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">PO</span></a></li> --}}
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.invoice') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Sales</span></a></li>
                <!--<li> <a class="waves-effect waves-dark" href="{{ route('backend.delivery-challan.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Delivery Challan</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.paymentMethod.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Payment Method</span></a></li>-->
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Expense</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('backend.expense.index') }}">Expense List</a></li>
                        <li><a href="{{ route('backend.expenseCategory.index') }}">Category</a></li>
                        <li><a href="{{ route('backend.expense-budget') }}">Budget</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Settings</span></a>
                    <ul aria-expanded="false" class="collapse">
                    <li><a href="{{ route('backend.user.index') }}">Add User</a></li>

                        <li><a href="{{ route('backend.carCategory.index') }}">Car Category </a></li>
                        <li><a href="{{ route('backend.paymentMethod.index') }}">Payment Method</a></li>
                        <li><a href="{{ route('backend.bookingPurpose.index') }}">Booking Purpose</a></li>
                        <li><a href="{{ route('backend.settings') }}">Frontend Settings</a></li>


                    </ul>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.booking.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Booking</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('backend.report') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Report</span></a></li>

              <!-- <li> <a class="waves-effect waves-dark" href="{{ route('backend.carExpense.index') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Car Expense</span></a></li>-->
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
