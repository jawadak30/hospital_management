<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="row row-cols-1">
                <div class="overflow-hidden d-slider1">
                    <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
<!-- Completed Appointments -->
<li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
    <div class="card-body">
        <div class="progress-widget">
            <div class="progress-detail">
                <p class="mb-2">Completed Appointments</p>
                <h4 class="counter">{{ $completedCount }}</h4>
            </div>
        </div>
    </div>
</li>

<!-- Pending Appointments -->
<li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1300">
    <div class="card-body">
        <div class="progress-widget">
            <div class="progress-detail">
                <p class="mb-2">Pending Appointments</p>
                <h4 class="counter">{{ $pendingCount }}</h4>
            </div>
        </div>
    </div>
</li>

<!-- Canceled Appointments -->
<li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1400">
    <div class="card-body">
        <div class="progress-widget">
            <div class="progress-detail">
                <p class="mb-2">Canceled Appointments</p>
                <h4 class="counter">{{ $canceledCount }}</h4>
            </div>
        </div>
    </div>
</li>

<!-- Medical Records -->
<li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1500">
    <div class="card-body">
        <div class="progress-widget">
            <div class="progress-detail">
                <p class="mb-2">Medical Records</p>
                <h4 class="counter">{{ $medicalRecordCount }}</h4>
            </div>
        </div>
    </div>
</li>

                    </ul>
                    <div class="swiper-button swiper-button-next"></div>
                    <div class="swiper-button swiper-button-prev"></div>
                </div>
            </div>
        </div>

     <div class="col-md-12 col-lg-4">
        <div class="row">

        </div>
     </div>
    </div>
        </div>
