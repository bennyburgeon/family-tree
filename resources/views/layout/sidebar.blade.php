<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img src="{{ asset('assets/img/elegance.png') }}" style="border-radius: 50%;" />
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2" style="font-size: 1.2rem;text-transform: capitalize;">{{ auth()->guard('admin')->user()->name }}</span><br>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Customer">Customers</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('customers.create') }}" class="menu-link">
                    <div data-i18n="Add Customer">Add Customers</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('customers.index') }}" class="menu-link">
                    <div data-i18n="List Customer">List Customers</div>
                  </a>
                </li>
               
              </ul>
            </li>
            
           
            
            <!-- User interface -->
            

           

           

           
            
           
            
          </ul>
        </aside>