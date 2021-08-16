
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('front.layout._head')
  </head>
  <body class="goto-here">
    @include('front.layout._topNav')
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    @include('front.layout._mainNav')
	  </nav>
    <!-- END nav -->

        @yield('content')

	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      @include('front.layout._newslatter')
    </section>
    <footer class="ftco-footer ftco-section">
      @include('front.layout._footer')
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  @include('front.layout._js')
    
  </body>
</html>