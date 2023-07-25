<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance | IT Support</title>

    <link rel="stylesheet" href="{{asset('assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main/app-dark.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('assets/css/shared/iconly.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-dztbJg6ukL7fJQ2adz0RUCfLYGxmf4xs9XnfY5eklHO5B+brLZ5LJjU8f6RmP6kNJ4xG4X4Z5d5ZufiiMw14hw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
         @include('ITSupport.layout.partials.sidebar')
        </div>
        <div id="main" class='layout-navbar'>
          @include('ITSupport.layout.partials.nav')
            <div id="main-content">

               @yield('content')

           @include('ITSupport.layout.partials.footer')
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>

    <!-- Need: Apexcharts -->
    <script src="{{asset('assets/js/navabr.js')}}"></script>
<script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
<script src="{{asset('assets/extensions/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/js/pages/sweetalert2.js')}}"></script>
<script src="{{asset('assets/extensions/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{asset('assets/js/pages/datatables.js')}}"></script>

</body>

</html>