    <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
            data-bs-auto-close="outside" aria-expanded="false">
            <i class="fas fa-laptop-medical"></i>
            @if (auth()->user()->sessions->count() > 1)
                <span id="session-count" class="badge bg-danger rounded-pill badge-notifications">
                    {{ auth()->user()->sessions->count() }}
                </span>
            @endif

        </a>
        <ul class="dropdown-menu dropdown-menu-end p-3" style="min-width: 400px;">
            <h6 class="dropdown-header">@lang('site.active_sessions')</h6>
            <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                <table class="table-sm align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>@lang('site.ip')</th>
                            <th>@lang('site.browser')</th>
                            <th>@lang('site.device')</th>
                            <th>@lang('site.last_activity')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (auth()->user()->sessions()->orderByDesc('last_activity')->get() as $session)
                            <tr>
                                <td>{{ $session->ip_address }}</td>
                                <td>{{ $session->user_agent['browser'] }} -
                                    {{ $session->user_agent['platform'] }}</td>
                                <td>
                                    <span
                                        class="badge {{ $session->user_agent['is_desktop'] ? 'bg-success' : 'bg-primary' }}">
                                        {{ $session->user_agent['is_desktop'] ? __('site.desktop') : __('site.mobile') }}
                                    </span>
                                </td>
                                <td>{{ $session->last_activity }}</td>
                                <td>
                                    @if (!$session->is_this_device)
                                        <button class="btn btn-sm btn-danger logout-session"
                                            data-id="{{ $session->id }}">
                                            {{ __('site.logout') }}
                                        </button>
                                    @else
                                        <span class="badge bg-secondary">{{ __('site.this_device') }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </ul>
    </li>
