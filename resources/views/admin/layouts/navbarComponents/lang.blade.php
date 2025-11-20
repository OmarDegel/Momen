 <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
     <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
         <i class="ti ti-language rounded-circle ti-md"></i>
     </a>
     <ul class="dropdown-menu dropdown-menu-end">
         @foreach (getLangs() as $key => $value)
             <li>
                 <a class="dropdown-item waves-effect {{ app()->getLocale() == $key ? 'active' : '' }}"
                     href="{{ route('dashboard.profile.change.lang', ['lang' => $key]) }}">
                     <span class="align-middle">{{ $value }}</span>
                 </a>
             </li>
         @endforeach
     </ul>
 </li>
