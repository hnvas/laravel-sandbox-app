<div class="sidebar"
     data-color="purple"
     data-background-color="black"
     data-image="{{ asset('img/sidebar.jpg') }}">

    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            HV
        </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                <a class="nav-link"
                   href="{{ route('dashboard.index') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/expense*') ? 'active' : '' }}">
                <a class="nav-link"
                   href="{{ route('expense.index') }}">
                    <i class="material-icons">money_off</i>
                    <p>Despesas</p>
                </a>
            </li>
        </ul>
    </div>

</div>
