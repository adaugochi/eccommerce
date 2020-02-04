<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    @guest
        <title> @yield('title') </title>
    @else
        <title> @yield('title') | {{ Auth::user()->name }}</title>
    @endguest

    <!-- vendor css -->
    <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="../lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">
    <link href="../lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="../lib/chartist/chartist.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="../lib/highlightjs/github.css" rel="stylesheet">
    <link href="../lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('css/temp_css/bracket.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
</head>

<body>

<main>
    <?php $user = auth()->user(); ?>
    @if(auth()->check() && $user->is_admin)
        @include('elements.sidebar')
        @include('elements.admin-header')
        <div class="br-mainpanel">
            @yield('content')

            @include('elements.footer')
        </div>
    @else
        @yield('content')
    @endif

</main>

<script src="../lib/jquery/jquery.js"></script>
<script src="{{ asset('lib/popper.js/popper.js') }}"></script>
<script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="../lib/moment/moment.js"></script>
<script src="../lib/jquery-ui/jquery-ui.js"></script>
<script src="../lib/jquery-switchbutton/jquery.switchButton.js"></script>
<script src="../lib/peity/jquery.peity.js"></script>
<script src="../lib/chartist/chartist.js"></script>
<script src="../lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
<script src="../lib/d3/d3.js"></script>
<script src="../lib/rickshaw/rickshaw.min.js"></script>
<script src="../lib/select2/js/select2.min.js"></script>
<script src="../lib/highlightjs/highlight.pack.js"></script>
<script src="../lib/datatables/jquery.dataTables.js"></script>
<script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="../lib/bootstrap/bootstrap.js"></script>

<script src="../js/temp_js/bracket.js"></script>
<script src="../js/temp_js/ResizeSensor.js"></script>
<script src="../js/temp_js/dashboard.js"></script>

<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="{{ asset('js/app2.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/checkout.js') }}"></script>


@yield('scripts')
</body>

</html>