<!DOCTYPE html>
<html>

<head>
  <style></style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header');
    <!-- end header section -->
    <!-- slider section -->
    @include('home.slider');
    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

  @include('home.product');

  <!-- end shop section -->


  <!-- contact section -->

  @include('home.footer');

</body>

</html>