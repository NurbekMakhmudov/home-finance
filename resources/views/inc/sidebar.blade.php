
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('home*') ? 'active' : '' }} {{ request()->is('/') ? 'active' : '' }}"
                   href="{{route('home-index')}}">
                    <span data-feather="home"></span>
                    Главный <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('category*') ? 'active' : '' }}"
                   href="{{route('category-index')}}">
                    <span data-feather="layers"></span>
                    Категории
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('transaction*') ? 'active' : '' }}"
                   href="{{route('transaction-index')}}">
                    <span data-feather="file-text"></span>
                    Транзакции
                </a>
            </li>
        </ul>
    </div>
</nav>
