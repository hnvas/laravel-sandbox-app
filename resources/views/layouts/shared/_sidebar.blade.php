<div class="sidebar"
     data-color="purple"
     data-background-color="black"
     data-image="{{ asset('img/sidebar.jpg') }}">

    <div class="logo">
        <a href="{{ route('dashboard.index') }}"
           class="simple-text logo-normal">
            HV
        </a>
    </div>

    <div class="sidebar-wrapper">

        <div class="user">
            <div class="photo">
                <img width="34px"
                     height="34px"
                     src="{{ asset('img/default.png') }}">
            </div>
            <div class="user-info">
                <a data-toggle="collapse"
                   href="#collapseExample"
                   class="username collapsed"
                   aria-expanded="false">
                    <span>{{ auth()->user()->name }} <b class="caret"></b></span>
                </a>
                <div class="collapse"
                     id="collapseExample"
                     style="">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link"
                               href="#">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal"> Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="#"
                               onclick="logout()">
                                <span class="sidebar-mini"> L </span>
                                <span class="sidebar-normal"> Logout </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

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

            <li class="nav-item {{ request()->is('admin/account*') ? 'active' : '' }}">
                <a class="nav-link"
                   href="{{ route('account.index') }}">
                    <i class="material-icons">account_balance</i>
                    <p>Contas</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/user*') ? 'active' : '' }}">
                <a class="nav-link"
                   href="{{ route('user.index') }}">
                    <i class="material-icons">supervisor_account</i>
                    <p>Usuários</p>
                </a>
            </li>
        </ul>
    </div>

</div>
