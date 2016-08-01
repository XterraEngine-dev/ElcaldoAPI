<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
@section('styles_laravel')
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/datatable-bootstrap.css') !!}
    <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    @show
    @yield('my_styles')
</head>
<body>
@include('partials.layout.navbar')
@include('partials.layout.errors')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @yield('content')
        </div>
    </div>
</div>
<!-- Scripts -->
{!! Html::script('assets/js/jquery.js') !!}
{!! Html::script('assets/js/jquery.dataTables.js') !!}
{!! Html::script('assets/js/bootstrap.min.js') !!}
{!! Html::script('assets/js/datatable-bootstrap.js') !!}
<script>
    $(document).ready(function(){
        $('#MyTable').dataTable();
    });
</script>

@yield('my_scripts')
</body>
</html>