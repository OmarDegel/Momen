            <ul class="nav nav-pills flex-column flex-md-row mb-4">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'dashboard.profile.index' ? 'active' : '' }}" href="{{ route('dashboard.profile.index') }}"><i class="ti-xs ti ti-users me-1"></i> Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'dashboard.profile.security' ? 'active' : '' }}" href="{{ route('dashboard.profile.security') }}"><i class="ti-xs ti ti-lock me-1"></i>
                        Security</a>
                </li>
            </ul>