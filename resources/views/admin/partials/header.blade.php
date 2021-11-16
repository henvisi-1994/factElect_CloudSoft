<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Facturacion| Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href= "{{ asset("Administrador/bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("Administrador/bower_components/font-awesome/css/font-awesome.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset("Administrador/bower_components/Ionicons/css/ionicons.min.css") }}">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset("Administrador/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">
   <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset("Administrador/bower_components/bootstrap-daterangepicker/daterangepicker.css") }}">
   <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset("Administrador/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css") }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset("Administrador/plugins/iCheck/all.css")}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset("Administrador/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css")}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ asset("Administrador/plugins/timepicker/bootstrap-timepicker.min.css")}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset("Administrador/bower_components/select2/dist/css/select2.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("Administrador/dist/css/AdminLTE.min.css") }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset("Administrador/dist/css/skins/_all-skins.min.css") }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset("Administrador/bower_components/morris.js/morris.css") }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset("Administrador/bower_components/jvectormap/jquery-jvectormap.css") }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset("Administrador/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") }}">
  <link rel="stylesheet" href="{{ asset("Administrador/css/administrador.css") }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <link rel="stylesheet" href="{{ asset("Administrador/dist/js/html5shiv.min.js") }}">
  <link rel="stylesheet" href="{{ asset("Administrador/dist/js/respond.min.js") }}">
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="{{ asset("Administrador/dist/css/toastr.css") }}">
  <link rel="stylesheet" href="{{ asset("Administrador/dist/css/fontFamili.css") }}">
</head>
