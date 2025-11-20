 <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="{{ getThemes()[auth()->user()->theme]['icon_class'] }}"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                    @foreach (getThemes() as $theme)
                        <li>
                            <a class="dropdown-item waves-effect {{ auth()->user()->theme == $theme['theme'] ? 'active' : '' }}"
                                href="{{ route('dashboard.profile.change.theme', ['theme' => $theme['theme']]) }}">
                                <span class="align-middle">
                                    <i class="{{ $theme['icon_class'] }}"></i>
                                    {{ $theme['value'] }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>

            </li>