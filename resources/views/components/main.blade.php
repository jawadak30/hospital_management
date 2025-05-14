@push('styles')
@vite('resources/css/main.css')
<style>
    /* Doctor Cards */
    .stats-section {
      padding: 8rem 0;
    }
    .stats-header {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }
    .stats-header h2 {
      font-size: 2rem;
      font-weight: bold;
    }
    .stats-header p {
      font-size: 1rem;
    }
    .stats-link {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-weight: bold;
      text-decoration: none;
      color: #000;
    }
    .stats-link:hover {
      text-decoration: underline;
    }
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      margin-top: 3.5rem;
    }
    .stat-item {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }
    .stat-value {
      font-size: 3rem;
      font-weight: bold;
    }
    .stat-label {
      font-size: 1rem;
    }
    .arrow-icon {
      width: 16px;
      height: 16px;
    }
    .product-box{
        width: 100%;
    }
.doctor-cards {
    padding: 0 20px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    width: 100%;
}

.doctor-card {
    background: #CAD6FF;
    border-radius: 17px;
    padding: 15px;
    display: flex;
    align-items: center;
    gap: 15px;
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.5s ease forwards;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.doctor-image img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
}

.doctor-info {
    flex: 1;
}

.doctor-info h2 {
    font-size: 15px;
    font-weight: 500;
    color: #2260FF;
    margin: 0;
}

.doctor-info p {
    font-size: 13px;
    font-weight: 300;
    color: black;
    margin: 5px 0;
}

.actions {
    display: flex;
    align-items: center;
    gap: 10px;
}

.action-button {
    background: #2260FF;
    border-radius: 18px;
    padding: 5px 10px;
    color: white;
    font-size: 15px;
    font-weight: 400;
    cursor: pointer;
    transition: background 0.3s ease;
}

.action-button:hover {
    background: #1a4dcc;
}

.action-icon {
    background: white;
    border-radius: 13px;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.action-icon:hover {
    transform: scale(1.1);
}

.action-icon svg {
    width: 12px;
    height: 12px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .doctor-cards {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    }

    .doctor-card {
        flex-direction: column;
        text-align: center;
    }

    .doctor-image img {
        width: 100px;
        height: 100px;
    }

    .actions {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .container {
        border-radius: 0;
    }

    .doctor-cards {
        grid-template-columns: 1fr;
    }

    .header h1 {
        font-size: 20px;
    }

    .sort-options {
        flex-wrap: wrap;
    }
}

.relative{
    width: 70%;
}
</style>
@endpush
<main>


    <div class="banner">

      <div class="container">

        <div class="slider-container has-scrollbar">

          <div class="slider-item">

            <img src="{{ asset('images_site/first.jpg') }}" alt="women's latest fashion sale" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle">E library</p>

              <h2 class="banner-title">Welcome to our library</h2>

              {{-- <p class="banner-text">
                starting at &dollar; <b>20</b>.00
              </p> --}}

              {{-- <a href="#" class="banner-btn">Shop now</a> --}}

            </div>

          </div>

          <div class="slider-item">

            <img src="{{ asset('images_site/two.jpg') }}" alt="modern sunglasses" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle"></p>

              <h2 class="banner-title">Modern books</h2>

              {{-- <p class="banner-text">
                starting at &dollar; <b>15</b>.00
              </p> --}}

              {{-- <a href="#" class="banner-btn">Shop now</a> --}}

            </div>

          </div>

          <div class="slider-item">

            <img src="{{ asset('images_site/3.jpg') }}" alt="new fashion summer sale" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle"></p>

              <h2 class="banner-title"></h2>

              {{-- <p class="banner-text">
                starting at &dollar; <b>29</b>.99
              </p> --}}

              {{-- <a href="#" class="banner-btn">Shop now</a> --}}

            </div>

          </div>

        </div>

      </div>

    </div>


<section class="stats-section">
    <div class="container">
        <div class="stats-header">
          <h2>Hospital Performance Insights</h2>
        </div>

        <div class="stats-grid">
          <div class="stat-item">
            <div class="stat-value">{{ $stats['doctors'] }}</div>
            <p class="stat-label">Doctors Available</p>
          </div>
          <div class="stat-item">
            <div class="stat-value">{{ $stats['patients'] }}</div>
            <p class="stat-label">Registered Patients</p>
          </div>
          <div class="stat-item">
            <div class="stat-value">{{ $stats['appointments'] }}</div>
            <p class="stat-label">Appointments This Month</p>
          </div>
          {{-- <div class="stat-item">
            <div class="stat-value">{{ $stats['beds_occupied'] }}</div>
            <p class="stat-label">Beds Occupied</p>
          </div> --}}
          {{-- <div class="stat-item">
            <div class="stat-value">{{ $stats['departments'] }}</div>
            <p class="stat-label">Departments</p>
          </div> --}}
        </div>
    </div>

</section>

    <div class="product-container">

        <div class="container">

          <div class="product-box">



            <!--
              - PRODUCT GRID
            -->

            <div class="product-main">
                <h2 class="title">{{ trans('mainTrans.books') }}</h2>

                <form method="GET" action="{{ route('guest_welcome') }}" class="flex items-center gap-4 mb-8">
                    <label for="specialization" class="text-gray-700 font-semibold text-lg">
                        Filter by Specialization:
                    </label>
                    <div class="relative">
                        <select
                            name="specialization"
                            id="specialization"
                            onchange="this.form.submit()"
                            class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                        >
                            <option value="">All Specializations</option>
                            @foreach ($specializations as $spec)
                                <option value="{{ $spec }}" {{ request('specialization') == $spec ? 'selected' : '' }}>
                                    {{ ucfirst($spec) }}
                                </option>
                            @endforeach
                        </select>

                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" />
                            </svg>
                        </div>
                    </div>
                                    <a href="{{ route('guest_welcome') }}" class="inline-block bg-gray-100 text-gray-700 px-4 py-2 rounded hover:bg-gray-200 transition">
                    Reset
                </a>
                </form>



                <div class="product-grid">
                    <div class="doctor-cards" id="doctor-cards">
                        @foreach ($doctors as $doctor)
                            <div class="doctor-card">
                                <div class="doctor-image">
                                    <img src="https://placehold.co/168x169" alt="{{ $doctor->user->name }}">
                                </div>
                                <div class="doctor-info">
                                    <h2>Dr. {{ $doctor->user->name }}</h2>
                                    <p>{{ $doctor->specialization }}</p>
                                    <div class="actions">
                                        <a href="{{route('view_profile',$doctor->id)}}" class="action-button info">Info</a>
                                        <div class="action-icon">
                                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <!-- SVG paths here -->
                                            </svg>
                                        </div>
                                        <div class="action-icon">
                                            <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <!-- SVG paths here -->
                                            </svg>
                                        </div>
                                        <div class="action-icon">
                                            <svg width="2" height="7" viewBox="0 0 2 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <!-- SVG paths here -->
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="pagination-links">
                    {{ $doctors->appends(request()->query())->links() }}
                </div>

            </div>

          </div>

        </div>

      </div>
      </div>


    {{-- <div class="blog">

      <div class="container">

        <div class="blog-container has-scrollbar">

          <div class="blog-card">

            <a href="#">
              <img src="./assets/images/blog-1.jpg" alt="Clothes Retail KPIs 2021 Guide for Clothes Executives" width="300" class="blog-banner">
            </a>

            <div class="blog-content">

              <a href="#" class="blog-category">Fashion</a>

              <a href="#">
                <h3 class="blog-title">Clothes Retail KPIs 2021 Guide for Clothes Executives.</h3>
              </a>

              <p class="blog-meta">
                By <cite>Mr Admin</cite> / <time datetime="2022-04-06">Apr 06, 2022</time>
              </p>

            </div>

          </div>

        </div>

      </div>

    </div> --}}

</main>

