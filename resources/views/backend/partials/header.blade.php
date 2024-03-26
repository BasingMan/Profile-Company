<div class="main">
    <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">                
                    <div class="nav-item">
                        <form method="POST" action="{{ route('backend.logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-danger">Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>