<!-- Footer -->
<footer class="page-footer font-small">
<hr class="rgba-white-light" style="">
  <!-- Footer Links -->
  <div class="container">

    <!-- Grid row-->
    <div class="row text-center d-flex justify-content-center pt-5 mb-3">
        
    @if(Auth::check())
      
      <!-- Grid column -->
      <div class="col-md-2 mb-3">
            <h6 class="text-uppercase font-weight-bold">
            <a href="{{route('home')}}">Dashboard</a>
            </h6>
      </div>
      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="{{route('results')}}">Results</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="{{route('compare')}}">Compare</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="{{route('entries')}}">Entries</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="{{route('calendar')}}">Calendar</a>
        </h6>
      </div>
      <!-- Grid column -->
    @else
        <!-- Grid column -->
        <div class="col-md-2 mb-3">
            <h6 class="text-uppercase font-weight-bold">
            <a href="{{route('home')}}">Home</a>
            </h6>
      </div>
        <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="{{route('login')}}">Login</a>
        </h6>
      </div>
    
    <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="{{route('register')}}">Register</a>
        </h6>
      </div>
    </div>
    @endif
    </div>
    <!-- Grid row-->

    <!-- Grid row-->
    <!-- Grid row-->
    <hr class="clearfix d-md-none rgba-white-light">

    <!-- Grid row-->
    <div class="row pb-3">

      <!-- Grid column -->
      <div class="col-md-12">


      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="#"> Isaac Underwood</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->