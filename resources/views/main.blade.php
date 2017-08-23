<!DOCTYPE html>
<html lang="en">
<head>
    @include('include.head')
</head>   

<body>
  <div id="wrapper">
    @include('include.nav')
      <div class="container-fluid">      
        <div class="col-md-12 content">
            <div class="row">
              <div class="ads">
                <div class="col-xs-12  col-md-12 col-lg-12">
                Ads Responsive
                </div>
              </div>
            </div>
              @include('include.messages')
              @yield('content')
        </div>
      </div>
    @include('include.footer')
    @include('include.javascript')
  </div>
</body>
</html>