@extends('layouts.admin.index')

@section('title', 'Dashboard')

@section('css')
  <style>
    .content {
      height: 527px;
      background-image: url('upload/img/Capture.PNG');
      background-size:  100% 100%;
      margin: 10px;
    }
}
  </style>
@endsection

@section('content')
	 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    </section>
    <!-- /.content -->
@endsection