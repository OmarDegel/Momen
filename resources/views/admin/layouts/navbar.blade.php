<nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Language -->
            @include('admin.layouts.navbarComponents.lang')
            <!--/ Language -->

            <!-- Style Switcher -->
           @include('admin.layouts.navbarComponents.themes')
            <!-- / Style Switcher-->

            <!-- Notification -->
            {{-- @include('admin.notifications.includes.notification_profile', [
                'notifications' => auth()->user()->notificationsUnread()->get(),
                'notificationCount' => auth()->user()->notificationsUnread()->count(),
            ]) --}}
            <!--/ Notification -->


            <!-- Active Sessions -->
            {{-- @include('admin.layouts.navbarComponents.sessions') --}}
            <!-- / Active Sessions -->


            {{-- Short Cuts --}}
           {{-- @include('admin.layouts.navbarComponents.shortCuts') --}}
            <!-- / Short Cuts -->



            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        @if (auth()->user()->image)
                            <img src={{ url(auth()->user()->image) }} alt class="h-auto rounded-circle" />
                        @else
                            <img src={{ url('admin/assets/img/avatars/1.png') }} alt class="h-auto rounded-circle" />
                        @endif
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('dashboard.profile.index') }}">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src={{ url('admin/assets/img/avatars/1.png') }} alt
                                            class="h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-medium d-block">{{ auth()->user()->name_first }}</span>
                                    <small class="text-muted">{{ __('site.admin') }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    <li>
                        <a class="dropdown-item"
                            href="">
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">{{__('site.profile')}}</span>
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item"  href="{{ route('dashboard.logout') }}" >
                            <i class="ti ti-logout me-2 ti-sm"></i>
                            <span class="align-middle">{{ __('site.logout') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>


</nav>
