<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#dd4a6fff" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#ffd036ff" />
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold">{{ $site_title }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @if (auth()->user()->hasPermission('home.index'))
        <li class="menu-item @if ($class == 'home') active @endif">
            <a href="{{ route('dashboard.home.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.home') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('roles.index'))
        <li class="menu-item @if ($class == 'roles') active @endif">
            <a href="{{ route('dashboard.roles.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.role') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('categories.index'))
        <li class="menu-item @if ($class == 'categories') active @endif">
            <a href="{{ route('dashboard.categories.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.categories') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('sizes.index'))
        <li class="menu-item @if ($class == 'sizes') active @endif">
            <a href="{{ route('dashboard.sizes.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.sizes') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('cities.index'))
        <li class="menu-item @if ($class == 'cities') active @endif">
            <a href="{{ route('dashboard.cities.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.cities') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('regions.index'))
        <li class="menu-item @if ($class == 'regions') active @endif">
            <a href="{{ route('dashboard.regions.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.regions') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('contacts.index'))
        <li class="menu-item @if ($class == 'contacts') active @endif">
            <a href="{{ route('dashboard.contacts.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.contacts') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('brands.index'))
        <li class="menu-item @if ($class == 'brands') active @endif">
            <a href="{{ route('dashboard.brands.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.brands') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('products.index'))
        <li class="menu-item @if ($class == 'products') active @endif">
            <a href="{{ route('dashboard.products.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.products') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('settings.index'))
        <li class="menu-item @if ($class == 'settings') active @endif">
            <a href="{{ route('dashboard.settings.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.settings') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('reviews.index'))
        <li class="menu-item @if ($class == 'reviews') active @endif">
            <a href="{{ route('dashboard.reviews.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.reviews') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('activity_logs.index'))
        <li class="menu-item @if ($class == 'activity_logs') active @endif">
            <a href="{{ route('dashboard.activity_logs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.activity_logs') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('pages.index'))
        <li class="menu-item @if ($class == 'pages') active @endif">
            <a href="{{ route('dashboard.pages.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.pages') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('users.index'))
        <li class="menu-item @if ($class == 'users') active @endif">
            <a href="{{ route('dashboard.users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.users') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('payments.index'))
        <li class="menu-item @if ($class == 'payments') active @endif">
            <a href="{{ route('dashboard.payments.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.payments') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('favorites.index'))
        <li class="menu-item @if ($class == 'favorites') active @endif">
            <a href="{{ route('dashboard.favorites.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.favorites') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('coupons.index'))
        <li class="menu-item @if ($class == 'coupons') active @endif">
            <a href="{{ route('dashboard.coupons.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.coupons') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('delivery_times.index'))
        <li class="menu-item @if ($class == 'delivery_times') active @endif">
            <a href="{{ route('dashboard.delivery_times.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.delivery_times') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('addresses.index'))
        <li class="menu-item @if ($class == 'addresses') active @endif">
            <a href="{{ route('dashboard.addresses.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.addresses') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('orders.index'))
        <li class="menu-item @if ($class == 'orders') active @endif">
            <a href="{{ route('dashboard.orders.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.orders') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('orderItemReturns.index'))
        <li class="menu-item @if ($class == 'orderItemReturns') active @endif">
            <a href="{{ route('dashboard.orderItemReturns.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.orderItemReturns') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('notifications.index'))
        <li class="menu-item @if ($class == 'notifications') active @endif">
            <a href="{{ route('dashboard.notifications.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.notifications') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('colors.index'))
        <li class="menu-item @if ($class == 'colors') active @endif">
            <a href="{{ route('dashboard.colors.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('site.colors') }}</div>
            </a>
        </li>
        @endif
        <li class="menu-item ">
            <a href="{{ route('dashboard.translations.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-translate"></i>
                <div>{{ __('site.translations') }}</div>
            </a>
        </li>


        {{-- <li class="menu-item ">
            <a href="{{ route('dashboard.cache', ['redirect' => url()->current()]) }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-bookmark"></i>
                <div>{{ __('site.optimize') }}</div>
            </a>
        </li> --}}
    </ul>
</aside>
<!-- / Menu -->