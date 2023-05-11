      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="#" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img src="/html/logo.png" class="dashboard-topbar-img">
              </span>
              <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span> -->
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ request()->is('admin') || request()->is('investigator') || request()->is('hr')  ? 'active' : '' }}">
             @if(request()->segment(1)=='admin')
              <a href="/admin" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
              @endif
              @if(request()->segment(1)=='investigator')
               <a href="/investigator" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-home-circle"></i>
                 <div data-i18n="Analytics">Dashboard</div>
               </a>
               @endif
               @if(request()->segment(1)=='hr')
                <a href="/investigator" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
                @endif
            </li>

            @if(isset(auth()->user()->role) && (auth()->user()->role==1))
            <li class="menu-item {{ request()->is('admin/hr') ||  request()->is('admin/hr/add') || request()->is('admin/hr/edit') ? 'active' : '' }}">
              <a href="/admin/hr" class="menu-link">
                <i class="bx bx-user me-2"></i>
                <div data-i18n="Analytics">Hr</div>
              </a>
            </li>
            <li class="menu-item {{ request()->is('admin/investigator') ||  request()->is('admin/investigator/add') || request()->is('admin/investigator/edit') ? 'active' : '' }}">
              <a href="/admin/investigator" class="menu-link">
                <i class="bx bx-user me-2"></i>
                <div data-i18n="Analytics">Investigator</div>
              </a>
            </li>
            @endif
            @if(isset(auth()->user()->role) && (auth()->user()->role==3))
            <li class="menu-item {{ request()->is('investigator/profile') ? 'active' : '' }}">
              <a href="/investigator/profile" class="menu-link">
                <i class="bx bx-user me-2"></i>
                <div data-i18n="Analytics">Investigator Profile</div>
              </a>
            </li>
            @endif

            <li class="menu-item">
              <a class="menu-link" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                <i class="bx bx-power-off me-2"></i>
                <div data-i18n="Analytics">Logout</div>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </li>
          </ul>
        </aside>
