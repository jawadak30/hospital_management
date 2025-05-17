<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="../dashboard/index.html" class="navbar-brand">

            <!--Logo start-->
            <div class="logo-main">
                <div class="logo-normal">
<svg fill="#000000" height="1.875rem" width="1.875rem" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
	 viewBox="0 0 492.308 492.308" xml:space="preserve">
<g>
	<g>
		<path d="M246.154,0C110.423,0,0,110.423,0,246.154s110.423,246.154,246.154,246.154s246.154-110.423,246.154-246.154
			S381.885,0,246.154,0z M246.154,472.615c-124.87,0-226.462-101.587-226.462-226.462S121.284,19.692,246.154,19.692
			c124.875,0,226.462,101.587,226.462,226.462S371.029,472.615,246.154,472.615z"/>
	</g>
</g>
<g>
	<g>
		<path d="M285.356,113.019v100.577h-78.404V113.019h-61.207v266.269h61.207V278.712h78.404v100.577h61.212V113.019H285.356z
			 M326.875,359.596h-21.827V259.019H187.26v100.577h-21.822V132.712h21.822v100.577h117.788V132.712h21.827V359.596z"/>
	</g>
</g>
</svg>
                </div>
                <div class="logo-mini">
                    <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                            transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                            transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                            transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                            transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                    </svg>
                </div>
            </div>
            <!--logo End-->




            <h4 class="logo-title">Hospitallia</h4>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <!-- Sidebar Menu Start -->


@if (auth()->user()->isDoctor())
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">{{ trans('mainTrans.home') }}</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('doctor_dashboard') }}">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="icon-20">
                                <path opacity="0.4"
                                    d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                    fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">{{ trans('mainTrans.dashboard') }}</span>
                    </a>
                </li>
                <li>
                    <hr class="hr-horizontal">
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button"
                        aria-expanded="false" aria-controls="horizontal-menu">
                        <i class="icon">

                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                <path opacity="0.4"
                                    d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z"
                                    fill="currentColor"></path>
                                <path opacity="0.4"
                                    d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z"
                                    fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">{{ trans('mainTrans.appointements') }}</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('all_appointment') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> {{ trans('mainTrans.appointements') }}</span></span>
                            </a>
                        </li>
                        <li class="nav-item" style="display: none">
                            <a class="nav-link " href="">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> </i>
                                <span class="item-name"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <hr class="hr-horizontal">
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#books-menu" role="button"
                        aria-expanded="false" aria-controls="books-menu">
<i class="fa-solid fa-bed"></i>
                        <span class="item-name">beds</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="books-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('beds.index') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">{{ trans('mainTrans.all_beds') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('beds.create') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">{{ trans('mainTrans.add_bed') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('beds.status') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">{{  trans('mainTrans.beds') }} status</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <hr class="hr-horizontal">
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#categories-menu" role="button"
                        aria-expanded="false" aria-controls="categories-menu">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                <path d="M4 4h16v16H4z" fill="currentColor"></path>
                                <path d="M8 4v16M16 4v16" stroke="currentColor" stroke-width="2"></path>
                            </svg>
                        </i>
                        <span class="item-name">prescriptions</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="categories-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('prescriptions.index') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">prescriptions</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('prescriptions.create') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">add prescription</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li>
                    <hr class="hr-horizontal">
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#users-menu" role="button"
                        aria-expanded="false" aria-controls="users-menu">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                <path
                                    d="M12 2C14.7614 2 17 4.23858 17 7C17 9.76142 14.7614 12 12 12C9.23858 12 7 9.76142 7 7C7 4.23858 9.23858 2 12 2Z"
                                    fill="currentColor"></path>
                                <path d="M5 20C5 16.6863 7.68629 14 11 14H13C16.3137 14 19 16.6863 19 20V21H5V20Z"
                                    fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">{{ trans('mainTrans.users') }}</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="users-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('all_users') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">{{ trans('mainTrans.all_users') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">{{ trans('mainTrans.add_user') }}</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li>
                    <hr class="hr-horizontal">
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#dossiers-menu" role="button"
                        aria-expanded="false" aria-controls="users-menu">
<i class="fas fa-file-medical"></i>
                        <span class="item-name">medical records</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="dossiers-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('medical_records.index') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">medical record</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">add dossier</span>
                            </a>
                        </li> --}}
                    </ul>
                </li>


                <li>
                    <hr class="hr-horizontal">
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#invoices-menu" role="button"
                        aria-expanded="false" aria-controls="users-menu">
<i class="fas fa-file-invoice"></i>
                        <span class="item-name">invoices</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="invoices-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('invoices.index') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">invoices</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('invoices.create') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">add invoice</span>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
@endif



@if (auth()->user()->isSuperAdmin())
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">{{ trans('mainTrans.home') }}</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('doctor_dashboard') }}">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="icon-20">
                                <path opacity="0.4"
                                    d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                    fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">{{ trans('mainTrans.dashboard') }}</span>
                    </a>
                </li>

                <li>
                    <hr class="hr-horizontal">
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#users-menu" role="button"
                        aria-expanded="false" aria-controls="users-menu">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                <path
                                    d="M12 2C14.7614 2 17 4.23858 17 7C17 9.76142 14.7614 12 12 12C9.23858 12 7 9.76142 7 7C7 4.23858 9.23858 2 12 2Z"
                                    fill="currentColor"></path>
                                <path d="M5 20C5 16.6863 7.68629 14 11 14H13C16.3137 14 19 16.6863 19 20V21H5V20Z"
                                    fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">{{ trans('mainTrans.users') }}</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="users-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin_all_users') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">{{ trans('mainTrans.all_users') }}</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">{{ trans('mainTrans.add_user') }}</span>
                            </a>
                        </li> --}}
                    </ul>
                </li>



            </ul>
@endif

@if (auth()->user()->isSecretary())
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">{{ trans('mainTrans.home') }}</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('doctor_dashboard') }}">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="icon-20">
                                <path opacity="0.4"
                                    d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                    fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">{{ trans('mainTrans.dashboard') }}</span>
                    </a>
                </li>
                <li>
                    <hr class="hr-horizontal">
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button"
                        aria-expanded="false" aria-controls="horizontal-menu">
                        <i class="icon">

                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                <path opacity="0.4"
                                    d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z"
                                    fill="currentColor"></path>
                                <path opacity="0.4"
                                    d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z"
                                    fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">{{ trans('mainTrans.appointements') }}</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('secretary.all_appointment') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> {{ trans('mainTrans.appointements') }}</span></span>
                            </a>
                        </li>
                        <li class="nav-item" style="display: none">
                            <a class="nav-link " href="">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> </i>
                                <span class="item-name"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li>
                    <hr class="hr-horizontal">
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#books-menu" role="button"
                        aria-expanded="false" aria-controls="books-menu">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                <path d="M4 3h16v18H4z" fill="currentColor"></path>
                                <path d="M8 3v18M16 3v18" stroke="currentColor" stroke-width="2"></path>
                            </svg>
                        </i>
                        <span class="item-name">beds</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="books-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('beds.index') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">all beds</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('beds.create') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">{{ trans('mainTrans.add_bed') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('beds.status') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">beds status</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li>
                    <hr class="hr-horizontal">
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#categories-menu" role="button"
                        aria-expanded="false" aria-controls="categories-menu">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                <path d="M4 4h16v16H4z" fill="currentColor"></path>
                                <path d="M8 4v16M16 4v16" stroke="currentColor" stroke-width="2"></path>
                            </svg>
                        </i>
                        <span class="item-name">prescriptions</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="categories-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('secretary.all_prescriptions') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">prescriptions</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('prescriptions.create') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">add prescription</span>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                {{-- <li>
                    <hr class="hr-horizontal">
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#users-menu" role="button"
                        aria-expanded="false" aria-controls="users-menu">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                <path
                                    d="M12 2C14.7614 2 17 4.23858 17 7C17 9.76142 14.7614 12 12 12C9.23858 12 7 9.76142 7 7C7 4.23858 9.23858 2 12 2Z"
                                    fill="currentColor"></path>
                                <path d="M5 20C5 16.6863 7.68629 14 11 14H13C16.3137 14 19 16.6863 19 20V21H5V20Z"
                                    fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">{{ trans('mainTrans.users') }}</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="users-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('all_users') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">{{ trans('mainTrans.all_users') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">{{ trans('mainTrans.add_user') }}</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}



                {{-- <li>
                    <hr class="hr-horizontal">
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#invoices-menu" role="button"
                        aria-expanded="false" aria-controls="users-menu">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                <path
                                    d="M12 2C14.7614 2 17 4.23858 17 7C17 9.76142 14.7614 12 12 12C9.23858 12 7 9.76142 7 7C7 4.23858 9.23858 2 12 2Z"
                                    fill="currentColor"></path>
                                <path d="M5 20C5 16.6863 7.68629 14 11 14H13C16.3137 14 19 16.6863 19 20V21H5V20Z"
                                    fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">invoices</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="invoices-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('invoices.index') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">invoices</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('invoices.create') }}">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </svg>
                                </i>
                                <span class="item-name">add invoice</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}


            </ul>
@endif

            <!-- Sidebar Menu End -->
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>
