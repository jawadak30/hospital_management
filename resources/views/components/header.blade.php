@push('styles')
    @vite('resources/css/header.css')
@endpush
<header>

    <div class="header-main">

        <div class="container">
            @auth
                <a href="" class="header-logo" style="padding: 5px 0px;">
                    <svg fill="#007bff" height="36" width="70" viewBox="0 0 492.308 492.308"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M246.154,0C110.423,0,0,110.423,0,246.154s110.423,246.154,246.154,246.154s246.154-110.423,246.154-246.154
                  S381.885,0,246.154,0z M246.154,472.615c-124.87,0-226.462-101.587-226.462-226.462S121.284,19.692,246.154,19.692
                  c124.875,0,226.462,101.587,226.462,226.462S371.029,472.615,246.154,472.615z" />
                        <path
                            d="M285.356,113.019v100.577h-78.404V113.019h-61.207v266.269h61.207V278.712h78.404v100.577h61.212V113.019H285.356z
                  M326.875,359.596h-21.827V259.019H187.26v100.577h-21.822V132.712h21.822v100.577h117.788V132.712h21.827V359.596z" />
                    </svg>
                    {{-- <img src="{{ asset('images_site/logo.jpg') }}" alt="Anon's logo" width="70" height="36"> --}}
                </a>
            @endauth
            @guest

                <a href="" class="header-logo" style="padding: 5px 0px;">
                    <svg fill="#007bff" height="36" width="70" viewBox="0 0 492.308 492.308"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M246.154,0C110.423,0,0,110.423,0,246.154s110.423,246.154,246.154,246.154s246.154-110.423,246.154-246.154
                  S381.885,0,246.154,0z M246.154,472.615c-124.87,0-226.462-101.587-226.462-226.462S121.284,19.692,246.154,19.692
                  c124.875,0,226.462,101.587,226.462,226.462S371.029,472.615,246.154,472.615z" />
                        <path
                            d="M285.356,113.019v100.577h-78.404V113.019h-61.207v266.269h61.207V278.712h78.404v100.577h61.212V113.019H285.356z
                  M326.875,359.596h-21.827V259.019H187.26v100.577h-21.822V132.712h21.822v100.577h117.788V132.712h21.827V359.596z" />
                    </svg>
                    {{-- <img src="{{ asset('images_site/logo.jpg') }}" alt="Anon's logo" width="70" height="36"> --}}
                </a>
            @endguest
            <div class="header-user-actions">
                @guest
                    <a href="{{ route('login') }}" class="action-btn" style="font-size: 20px">{{ trans('mainTrans.login') }}</a>
                @endguest
                @guest
                    <a href="{{ route('register') }}" class="action-btn" style="font-size: 20px">{{ trans('mainTrans.register') }}</a>
                @endguest


                {{-- @auth
            <a class="action-btn" href="">
                <ion-icon name="bag-handle-outline"></ion-icon>
                <span class="count">{{ session()->has('cart') ? count(session('cart')) : 0 }}</span>
            </a>
          @endauth
          @guest
            <a class="action-btn" href="">
                <ion-icon name="bag-handle-outline"></ion-icon>
                <span class="count">{{ session()->has('cart') ? count(session('cart')) : 0 }}</span>
            </a>
          @endguest --}}

            </div>

            <div class="header-top-actions">
                @auth
                    <a href="{{ route('patient_dashboard') }}" class="action-btn" style="font-size: 20px">home</a>
                @endauth
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="true">
                        {{ trans('mainTrans.languages') }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    @auth
                        <li class="menu-category">


                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2"
                                data-bs-toggle="dropdown" aria-expanded="true">
                                {{ trans('mainTrans.settings') }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                @if (auth()->user()->isPatient())
                                    <li class="dropdown-item">
                                        <a class="submenu-title"
                                            href="{{ route('patient_profile') }}">{{ trans('mainTrans.profile') }}</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="submenu-title" href="{{ route('patient.medical_records') }}">medical record</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="submenu-title"
                                            href="{{ route('patient.appointements') }}">appointements</a>
                                    </li>
                                @endif
                                <li class="dropdown-item">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="submenu-title">logout</button>
                                    </form>
                                </li>
                            </ul>



                            {{-- <button class="accordion-menu" data-accordion-btn>
                  <p class="menu-title">{{ trans('mainTrans.settings') }}</p>

                  <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                </button>

                <ul class="submenu-category-list" data-accordion>
                    <li class="submenu-category">
                    <a class="submenu-title" href="">{{ trans('mainTrans.profile') }}</a>
                    </li>
                                        <li class="submenu-category">
                    <a class="submenu-title" href="">{{ trans('mainTrans.profile') }}</a>
                    </li>
                                        <li class="submenu-category">
                    <a class="submenu-title" href="">{{ trans('mainTrans.profile') }}</a>
                    </li>


                </ul> --}}

                        </li>
                    @endauth


                </div>

            </div>

        </div>

    </div>

    <nav class="desktop-navigation-menu">

    </nav>



    <div class="mobile-bottom-navigation">
        {{-- @auth
        <a class="action-btn" href="">
            <ion-icon name="bag-handle-outline"></ion-icon>
            <span class="count">{{ session()->has('cart') ? count(session('cart')) : 0 }}</span>
        </a>

        @endauth
        @guest
        <a class="action-btn" href="">
            <ion-icon name="bag-handle-outline"></ion-icon>
            <span class="count">{{ session()->has('cart') ? count(session('cart')) : 0 }}</span>
        </a>

        @endguest --}}

        <a class="action-btn" href="">
            <ion-icon name="home-outline"></ion-icon>
        </a>

        <button class="action-btn" data-mobile-menu-open-btn>
            <ion-icon name="grid-outline"></ion-icon>
        </button>

    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

        <div class="menu-top">
            <h2 class="menu-title">Menu</h2>

            <button class="menu-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>

        <ul class="mobile-menu-category-list">
            @guest
                <li class="menu-category">
                    <a href="" class="menu-title">{{ trans('mainTrans.home') }}</a>
                </li>
            @endguest
            @auth
                @if (auth()->user()->isPatient())
                    <li class="menu-category">
                        <a href="{{ route('patient_dashboard') }}" class="menu-title">{{ trans('mainTrans.home') }}</a>
                    </li>
                    <li class="menu-category">
                        <a href="{{ route('patient_profile') }}" class="menu-title">profile</a>
                    </li>
                    <li class="menu-category">
                        <a href="{{ route('patient.appointements') }}"
                            class="menu-title">{{ trans('mainTrans.appointments') }}</a>
                    </li>
                    <li class="menu-category">
                        <a href="{{ route('patient.medical_records') }}"
                            class="menu-title">{{ trans('mainTrans.dossier') }}</a>
                    </li>
                    <li class="menu-category">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="submenu-title">logout</button>
                        </form>
                    </li>
                @endif
            @endauth
            @guest
                <li class="menu-category">
                    <a href="{{ route('login') }}" class="menu-title">{{ trans('mainTrans.login') }}</a>
                </li>
                <li class="menu-category">
                    <a href="{{ route('register') }}" class="menu-title">{{ trans('mainTrans.register') }}</a>
                </li>
            @endguest

            <li class="menu-category">

                {{-- <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">{{ trans('mainTrans.categories') }}</p>

              <div>
                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
              </div>
            </button> --}}

                <ul class="submenu-category-list" data-accordion>

                    {{-- @foreach ($categories as $category)
                    @guest
                    <li class="submenu-category">
                        <a class="submenu-title" href="{{ route('showLivres_guest', $category->id) }}">{{ $category->name }}</a>
                    </li>
                    @endguest
                    @auth
                    <li class="submenu-category">
                        <a class="submenu-title" href="{{ route('showLivres_user', $category->id) }}">{{ $category->name }}</a>
                    </li>
                    @endauth
                @endforeach --}}
                </ul>

            </li>

        </ul>

        <div class="menu-bottom">

            <ul class="menu-category-list">

                <li class="menu-category">

                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">{{ trans('mainTrans.languages') }}</p>

                        <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                    </button>

                    <ul class="submenu-category-list" data-accordion>

                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="submenu-category">
                                <a class="submenu-title" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach

                    </ul>

                </li>

                {{-- <li class="menu-category">
                    @auth
                        <a class="menu-title" href="" class="action-btn">{{ trans('mainTrans.profile') }}</a>
                    @endauth
                </li> --}}

            </ul>

        </div>

    </nav>

</header>
