<div class="adminx-sidebar expand-hover push">
    <ul class="sidebar-nav">
        <li class="sidebar-nav-item">
            <a href="{{ route('dashboard') }}" class="sidebar-nav-link active">
                <span class="sidebar-nav-icon">
                    <i data-feather="home"></i>
                </span>
                <span class="sidebar-nav-name">
                    Dashboard
                </span>
                <span class="sidebar-nav-end">

                </span>
            </a>
        </li>

        <li class="sidebar-nav-item">
            <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#example" aria-expanded="false"
                aria-controls="example">
                <span class="sidebar-nav-icon">
                    <i data-feather="pie-chart"></i>
                </span>
                <span class="sidebar-nav-name">
                    Ref
                </span>
                <span class="sidebar-nav-end">
                    <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                </span>
            </a>

            <ul class="sidebar-sub-nav collapse" id="example">
                <li class="sidebar-nav-item">
                    <a href="{{ route('ref-instansi.index') }}" class="sidebar-nav-link">
                        <span class="sidebar-nav-abbr">
                            Ins
                        </span>
                        <span class="sidebar-nav-name">
                            Instansi
                        </span>
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="{{ route('ref-interdepen.index') }}" class="sidebar-nav-link">
                        <span class="sidebar-nav-abbr">
                            Int
                        </span>
                        <span class="sidebar-nav-name">
                            Interdepen
                        </span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</div>