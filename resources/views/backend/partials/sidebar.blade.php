<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="#">
                <span class="align-middle">AdminKit</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Pages
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('backend.dashboard') }}">
                        <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                @can('Admin')
                    <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('backend.logo.index') }}">
                        <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Logo</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('backend.porto.index') }}">
                        <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Portofolio</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('backend.testi.index') }}">
                        <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Testimoni</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('backend.slider.index') }}">
                        <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Banner</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('backend.ser.index') }}">
                        <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Services</span>
                    </a>
                </li>

                @endcan

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('backend.art.index') }}">
                        <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Article</span>
                    </a>
                </li>

                @can('Admin')
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('backend.user.index') }}">
                        <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">User</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/pengaturan">
                        <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Pengaturan
                            Web</span>
                    </a>
                </li>
                @endcan
                
            </ul>


        </div>
    </nav>

    <script>
        var currentUrl = window.location.href;

        var sidebarItems = document.querySelectorAll('.sidebar-item');


        sidebarItems.forEach(function(item) {

            item.classList.remove('active');

            var link = item.querySelector('.sidebar-link');

            var linkHref = link.getAttribute('href');

            if (currentUrl.includes(linkHref)) {
                item.classList.add('active');
            }
        });

    </script>
