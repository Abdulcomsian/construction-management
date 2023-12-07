
<div id="kt_header" style="" class="header align-items-stretch commonSideBar">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Aside mobile toggle-->
        <!-- <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-color-white" id="kt_aside_mobile_toggle">
                <i class="bi bi-list fs-1"></i>
            </div>
        </div> -->
        <!--end::Aside mobile toggle-->
        <!--begin::Mobile logo-->
        <!-- <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="index.html" class="d-lg-none">
                <img alt="Logo" src="{{asset('assets/media/logos/logo-compact.svg')}}" class="h-15px"/>
            </a>
        </div> -->
        <!--end::Mobile logo-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu align-items-stretch" data-kt-drawer="true"
                     data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                     data-kt-drawer-overlay="true"
                     data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                     data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle"
                     data-kt-place="true" data-kt-place-mode="prepend"
                     data-kt-place-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <!--begin::Menu-->
                    <div
                        class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1">
                             @if(auth()->user() && \Auth::user()->hasRole([['admin', 'company','user']]))
                                <a class="menu-link" href="{{route('dashboard')}}">
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            @endif
                            <a data-toggle="tooltip" class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{route('projects.index')}}" target="" title="" data-original-title="With Bootstrap&nbsp;5">Projects</a>
                            @if(auth()->user() && \Auth::user()->hasAnyRole(['admin', 'company']))
                                <a data-toggle="tooltip" class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{ route('companies.index') }}" target="" title="" data-original-title="With Bootstrap&nbsp;4">Companies</a>
                            @endif
                            @if(auth()->user() && \Auth::user()->hasAnyRole(['admin', 'company']))
                                <a class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{ route('users.index') }}" target="">Users</a>
                            @endif
                            <a class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{ route('temporary_works.index') }}" target="">Temporary Works Register</a>
                            <a class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{ route('temporary_works.create') }}" target="">New Design Brief</a>
                            <a class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{route('temporary_works.shared')}}" target="">Shared Temporary Works</a>
                        </div>
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->
            <!--begin::Topbar-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <!--begin::Toolbar wrapper-->
                <div class="topbar d-flex align-items-stretch flex-shrink-0">
                    <!--begin::User-->
                    <div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <!-- THis notification is for user, was added later, when client asked to implement notification for user nomination flow. -->
                      
                        <!-- notification work here -->
                         @if(auth()->user() && auth()->user()->hasRole('company')) 
                        @php $notifications=App\Utils\HelperFunctions::getNotificaions();@endphp
                       
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown notification-ui me-2"> 
                                <!-- <a class="nav-link dropdown-toggle notification-ui_icon" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                    <i class="fa fa-bell {{count($notifications) > 0 ? 'redBgBlink' :'' }}"></i> 
                                    <span class="badge unread-notification">{{count($notifications)}}</span> 
                                </a> -->
                                 <div class="dropdown-menu notification-ui_dd" aria-labelledby="navbarDropdown">
                                      <div class="notification-ui_dd-header">
                                        <h3 class="text-center">Notifications</h3>
                                       </div>
                                      <div class="notification-ui_dd-content text-center">
                                      

                                        @forelse($notifications as $notification)
                                        <div class="notification-list notification-list--unread">
                                            <div class="notification-list_img"><p><b>{{ $notification->data['name'] }}</b> 
                                            </div>
                                            <div class="notification-list_detail">
                                              {{ $notification->data['message'] }}</p>
                                              <p><small>{{ $notification->created_at }}</small></p>
                                            </div>
                                            <div class="notification-list_feature-img">
                                                <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                                                Mark as read
                                            </a>
                                           </div>
                                        </div>
                                         @if($loop->last)
                                            <div class="notification-ui_dd-footer text-center py-3"> 
                                                <button class="btn btn-success btn-block" id="mark-all">Mark all as read</button> 
                                            </div>
                                        @endif
                                        @empty
                                        There are no new notifications
                                        @endforelse
                                        
                                       
                                      </div>
                                     <!--   -->

                                </div>
                            </li>
                        </ul>
                          @endif 
                          

                        <div
                            class="topbar-item cursor-pointer symbol px-3 px-lg-5 me-n3 me-lg-n5 symbol-30px symbol-md-35px"
                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                            data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                            @if(auth()->user())
                                @if(isset(auth()->user()->userCompany))
                                <img alt="Logo" src="{{ auth()->user()->userCompany->image ?? '' }}">
                                @elseif(isset(auth()->user()->image))
                                <img alt="Logo" src="{{ auth()->user()->image ?? '' }}">
                                @else
                                <div class="symbol-label fs-3 bg-light-primary text-primary" style="display:flex !important;">
                                    {{ auth()->user()->name[0] ?: '' }}</div>
                                @endisset
                            @endif

                        </div>
                        <!--begin::Menu-->
                        <div
                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    @if(auth()->user())
                                    <div class="symbol symbol-50px me-5">
                                        @if(isset(auth()->user()->userCompany))
                                        <img alt="Logo" src="{{ auth()->user()->userCompany->image ?? '' }}">
                                        @elseif(isset(auth()->user()->image))
                                        <img alt="Logo" src="{{ auth()->user()->image ?? '' }}">
                                        @else
                                        <div class="symbol-label fs-3 bg-light-primary text-primary" style="display:flex !important;">
                                            {{ auth()->user()->name[0] ?: '' }}</div>
                                        @endisset
                                    </div>
                                    @endif
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    @if(auth()->user())
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->name ?: '' }}</div>
                                        <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                    </div>
                                    @endif
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            @if(auth()->user())
                                @if(auth()->user()->hasRole(['admin','company','user']))
                                <div class="menu-item px-5">
                                    <a href="{{ route('users.admin.edit',auth()->id()) }}" class="menu-link px-5">Account Settings</a>
                                </div>
                                @endif
                            @endif
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a class="menu-link px-5"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        {{-- <a href="#" class="mainMenu-link" style="position:absolute; left: 40px; top: 23px" onclick="hideCheck1()">Menu</a> --}}

                        <!--end::Menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::User -->
                    <!--begin::Heaeder menu toggle-->
                    <div class="d-flex align-items-stretch d-lg-none px-3 me-n3" title="Show header menu">
                        <div class="topbar-item" id="kt_header_menu_mobile_toggle">
                            <i class="bi bi-text-left fs-1"></i>
                        </div>
                    </div>
                    <!--end::Heaeder menu toggle-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>

