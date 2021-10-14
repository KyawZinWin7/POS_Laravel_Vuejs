<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bilions POS | Home</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet"> 

  <!-- ===== font awesome ===== -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

  <!-- ===== bootstrap(need) ===== -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <?php 
  $theme = '#994894';
  ?>
  <style>
    :root {
      --theme: <?php echo $theme ?>;
      --secondary-theme: #F4F4F4;
    }

  </style>

  @foreach ($cssFiles as $css)
  <link rel="stylesheet" href="/build{{ $css }}">
  @endforeach

  <script>
    window.baseUrl = "{{ url('/') }}";
    window.$themeColor = "{{$theme}}"
  </script>


  <div id="app">
  </div>

  @foreach ($jsFiles as $js)
    <script src="/build{{ $js }}"></script>
  @endforeach
  </body>

</html>