<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="mx-auto">
            <img src="{{ url('assets/images/logo.svg') }}" class="logo-icon" alt="logo icon">
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        {{-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> <a href="{{ url('index') }}"><i class="bx bx-right-arrow-alt"></i>eCommerce</a>
                </li>
                <li> <a href="{{ url('dashboard-alternate') }}"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">UI Elements</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-menu"></i>
                </div>
                <div class="menu-title">Menu Levels</div>
            </a>
            <ul>
                <li>
                    <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level One</a>
                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level Two</a>
                            <ul>
                                <li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level Three</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li> --}}

        @if (Module::isEnabled('Library'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="bx bxs-book"></i>
                    </div>
                    <div class="menu-title">{{ __('Books') }}</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('categories.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>{{ __('Categories') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('books.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>{{ __('Books') }}</a>
                    </li>
                </ul>
            </li>
        @endif
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cog'></i>
                </div>
                <div class="menu-title">{{ __('Settings') }}</div>
            </a>
            <ul>
                @if (Module::isEnabled('User'))
                    <li>
                        <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>{{ __('Users & Companies') }}</a>
                        <ul>
                            <li>
                                <a href="{{ route('users.index') }}"><i class="bx bx-right-arrow-alt"></i>{{ __('Users') }}</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
