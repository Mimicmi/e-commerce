<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{asset('admin/img/logo/logo.png')}}" rel="icon">
  <title>RuangAdmin - Dashboard</title>
  <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('admin/css/ruang-admin.min.css')}}" rel="stylesheet">
</head>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
    .inset-0 {
        z-index: 999 !important;
    }
</style>

<body id="page-top">

    @notifyCss
    @include('notify::messages')
    @notifyJs
