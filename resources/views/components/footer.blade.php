@push('styles')
    @vite('resources/css/footer.css')
@endpush

<footer>
  <div class="footer-nav">
    <div class="container">
      <div class="footer-logo" style="width:25%; height: 25%;">
        <svg fill="#007bff" height="100%" width="100%" viewBox="0 0 492.308 492.308" xmlns="http://www.w3.org/2000/svg">
          <path d="M246.154,0C110.423,0,0,110.423,0,246.154s110.423,246.154,246.154,246.154s246.154-110.423,246.154-246.154
              S381.885,0,246.154,0z M246.154,472.615c-124.87,0-226.462-101.587-226.462-226.462S121.284,19.692,246.154,19.692
              c124.875,0,226.462,101.587,226.462,226.462S371.029,472.615,246.154,472.615z"/>
          <path d="M285.356,113.019v100.577h-78.404V113.019h-61.207v266.269h61.207V278.712h78.404v100.577h61.212V113.019H285.356z
              M326.875,359.596h-21.827V259.019H187.26v100.577h-21.822V132.712h21.822v100.577h117.788V132.712h21.827V359.596z"/>
        </svg>
        <h1 class="footer-brand">Your Hospital</h1>
      </div>
      <!-- About the Hospital -->
      <ul class="footer-nav-list">
        <li class="footer-nav-item">
          <h2 class="nav-title">About Us</h2>
        </li>
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Our Hospital</a>
        </li>
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Our Doctors</a>
        </li>
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Departments</a>
        </li>
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Mission & Vision</a>
        </li>
      </ul>

      <!-- Patient Services -->
      <ul class="footer-nav-list">
        <li class="footer-nav-item">
          <h2 class="nav-title">Patient Services</h2>
        </li>
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Book Appointment</a>
        </li>
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Medical Records</a>
        </li>
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Online Consultation</a>
        </li>
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Health Packages</a>
        </li>
      </ul>

      <!-- Support & Info -->
      <ul class="footer-nav-list">
        <li class="footer-nav-item">
          <h2 class="nav-title">Support</h2>
        </li>
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">FAQs</a>
        </li>
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Privacy Policy</a>
        </li>
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Terms of Service</a>
        </li>
        <li class="footer-nav-item">
          <a href="#" class="footer-nav-link">Contact Us</a>
        </li>
      </ul>

    </div>
  </div>

  <div class="footer-bottom">
    <div class="container">
      <p class="copyright">
        &copy; {{ date('Y') }} <a href="#">Your Hospital Name</a>. All rights reserved.
      </p>
    </div>
  </div>
</footer>
