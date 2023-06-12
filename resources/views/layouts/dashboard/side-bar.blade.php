<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="{{url('dashboard')}}">
            <img alt="Logo" src="{{asset('assets/media/logos/logo.png')}}"
                style="height:auto !important; width:100%; max-width:300px;" class="h-15px logo" />
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-double-left.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path
                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.5"
                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-2 py-5 py-lg-8" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <!--begin::Menu-->

            @if(auth()->user())

            <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion mb-1">
                @if(\Auth::user()->hasRole([['admin', 'company']]))
                <span class="menu-link userIconLink">
                    <span class="menu-icon userIcon">
                        <!-- <i class="fas fa-user fs-3"></i> -->
                        <img src="{{asset('assets/media/images/alpha-capital.png')}}">
                    </span>
                    <span class="menu-icon-hover">
                        <!-- <i class="fas fa-user fs-3"></i> -->
                        <img src="{{asset('assets/media/images/1.png')}}">
                    </span>
                    <span class="menu-title">Companies & Projects</span>
                    <span class="menu-arrow"></span>
                </span>
                @endif
                <div class="menu-sub menu-sub-accordion">
                    @if(\Auth::user()->hasRole([['admin', 'company']]))
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('dashboard')}}">
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </div>
                    @if(\Auth::user()->hasRole([['user', 'company']]))
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('projects.backup')}}">
                            <span class="menu-title">Backup</span>
                        </a>
                    </div>
                    @endif
                    @endif
                    @if(\Auth::user()->hasRole([['admin', 'company']]))
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('projects.index')}}">
                            <!-- <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span> -->
                            <span class="menu-title">Projects</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('companies.index') }}">
                            <!-- <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span> -->
                            <span class="menu-title">Companies</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('users.index') }}">
                            <span class="menu-title">Users</span>
                        </a>
                    </div>
                    @if(\Auth::user()->hasRole(['admin','company']))
                    <div class="menu-item">
                        <a class="menu-link" href="{{url('adminDesigner')}}">
                            <span class="menu-title">Admin Designers</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{url('adminSupplier')}}">
                            <span class="menu-title">Admin Suppliers</span>
                        </a>
                    </div>
                    @endif
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('designer.list')}}">
                            <span class="menu-title">Designers</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('suppliers.index')}}">
                            <span class="menu-title">Suppliers</span>
                        </a>
                    </div>
                    @endif

                    @if(\Auth::user()->hasAnyRole(['company']))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('users.assign.project') }}">
                            <span class="menu-title">Project Nomination</span>
                        </a>
                    </div>
                    @endif
                    @if(\Auth::user()->hasAnyRole(['estimator','user']))
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('estimator.index') }}">
                            <span class="menu-title">Estimator Register</span>
                        </a>
                    </div>
                    @endif

                </div>
                @if(\Auth::user()->hasAnyRole(['company','admin','user','supervisor','scaffolder']))
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion mb-1">
                    <span class="menu-link userIconTask">
                        <span class="menu-icon userTask">
                            <img src="{{asset('assets/media/images/12.png')}}">
                        </span>
                        <span class="menu-icon userHoverTask">
                            <img src="{{asset('assets/media/images/23.png')}}">
                        </span>
                        <span class="menu-title">Temporary Works</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('temporary_works.index') }}">
                                <span class="menu-title">Temporary Works Register</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('temporary_works.shared') }}">
                                <span class="menu-title">Shared Temporary Works</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('temporary_works.create') }}">
                                <span class="menu-title">New Design Brief</span>
                            </a>
                        </div>

                    </div>
                </div>
                @endif

                @if(\Auth::user()->hasRole(['designer','Design Checker','Designer and Design Checker']))
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion mb-1">
                    <span class="menu-link userIconTask">
                        <span class="menu-icon userTask">
                            <img src="{{asset('assets/media/images/12.png')}}">
                        </span>
                        <span class="menu-icon userHoverTask">
                            <img src="{{asset('assets/media/images/23.png')}}">
                        </span>
                        <span class="menu-title">Temporary Work Designer</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">

                        @if(\Auth::user()->hasAnyRole(['designer','Design Checker','Designer and Design Checker']) &&
                        \Auth::user()->di_designer_id==NULL)

                        <div class="menu-item">
                            <a class="menu-link" href="{{url('adminDesigner/create-profile',auth()->user()->id)}}">
                                <span class="menu-title">Create Company Profile</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('estimator_list')}}">
                                <span class="menu-title">Add Jobs</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('adminDesigner.designerList')}}">
                                <span class="menu-title">Designer List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('designer/projectAssign')}}">
                                <span class="menu-title">Project Assign</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('designer/designer')}}">
                                <span class="menu-title">Estimator List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('designer/awarded-estimator')}}">
                                <span class="menu-title">Awarded Estimator</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('calendar')}}">
                                <span class="menu-title">Calendar</span>
                            </a>
                        </div>
                        @endif
                        @if(\Auth::user()->hasAnyRole(['designer','Design Checker','Designer and Design Checker']) &&
                        \Auth::user()->company_id)
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('designer/designer')}}">
                                <span class="menu-title">Estimator List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('designer/awarded-estimator')}}">
                                <span class="menu-title">Awarded Estimator</span>
                            </a>
                        </div>
                        @endif
                        @if(\Auth::user()->hasAnyRole(['designer','Design Checker','Designer and Design Checker']) &&
                        \Auth::user()->di_designer_id != NULL)
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('adminDesigner/create-nomination',auth()->user()->id)}}">
                                <span class="menu-title">Add Nomination</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('designer/awarded-estimator')}}">
                                <span class="menu-title">Awarded Estimator</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('adminDesigner/create-appointment',auth()->user()->id)}}">
                                <span class="menu-title">Add Appointment</span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                @endif


            </div>

            @endif
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Aside menu-->
    <!--end::Footer-->
</div>