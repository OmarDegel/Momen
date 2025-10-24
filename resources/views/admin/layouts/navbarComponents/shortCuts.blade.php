 <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
     <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
         data-bs-auto-close="outside" aria-expanded="false">
         <i class="ti ti-layout-grid-add ti-md"></i>
     </a>
     <div class="dropdown-menu dropdown-menu-end py-0">
         <div class="dropdown-menu-header border-bottom">
             <div class="dropdown-header d-flex align-items-center py-3">
                 <h5 class="text-body mb-0 me-auto">{{ __('site.shortcut') }}</h5>
             </div>
         </div>
         <div class="dropdown-shortcuts-list scrollable-container ps">
             <div class="row row-bordered overflow-visible g-0">
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                         <i class="ti ti-files fs-4"></i>
                     </span>
                     <a href="{{ route('dashboard.pages.index') }}" class="stretched-link">{{ __('site.pages') }}</a>
                     <small class="text-muted mb-0">{{ __('site.pages_management') }}</small>
                 </div>
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                         <i class="ti ti-file-invoice fs-4"></i>
                     </span>
                     <a href="" class="stretched-link">{{ __('site.products') }}</a>
                     <small class="text-muted mb-0">{{ __('site.products_management') }}</small>
                 </div>
             </div>
             <div class="row row-bordered overflow-visible g-0">
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                         <i class="ti ti-users fs-4"></i>
                     </span>
                     <a href="{{ route('dashboard.users.index', ['type' => 'client']) }}"
                         class="stretched-link">{{ __('site.clients') }}</a>
                     <small class="text-muted mb-0">{{ __('site.clients_management') }}</small>
                 </div>
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                         <i class="ti ti-lock fs-4"></i>
                     </span>
                     <a href="{{ 'dashboard.roles.index' }}" class="stretched-link">{{ __('site.roles') }}</a>
                     <small class="text-muted mb-0">{{ __('site.roles_management') }}</small>
                 </div>
             </div>
             <div class="row row-bordered overflow-visible g-0">
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                         <i class="ti ti-chart-bar fs-4"></i>
                     </span>
                     <a href="{{ route('dashboard.home.index') }}"
                         class="stretched-link">{{ __('site.dashboard') }}</a>
                     <small class="text-muted mb-0">{{ __('site.dashboard') }}</small>
                 </div>
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                         <i class="ti ti-settings fs-4"></i>
                     </span>
                     <a href="{{ route('dashboard.settings.show', 1) }}"
                         class="stretched-link">{{ __('site.settings') }}</a>
                     <small class="text-muted mb-0">{{ __('site.settings') }}</small>
                 </div>
             </div>
             <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                 <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
             </div>
             <div class="ps__rail-y" style="top: 0px; right: 0px;">
                 <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
             </div>
         </div>
     </div>
 </li>
