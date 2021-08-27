@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Панель управления</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-3 col-6">
            <x-adminlte-small-box title="{{ $countOrders }}" text="Заказы" icon="ion ion-bag"
                                  theme="info" url="#" url-text="More info"/>
        </div>

        <div class="col-sm-12 col-lg-3 col-6">
            <x-adminlte-small-box title="{{ $countProducts }}" text="Товары" icon="fas fa-chart-bar"
                                  theme="success" url="#" url-text="More info"/>
        </div>

        <div class="col-sm-12 col-lg-3 col-6">
            <x-adminlte-small-box title="{{ $countUsers }}" text="Пользователи" icon="ion ion-person-add"
                                  theme="warning" url="#" url-text="More info"/>
        </div>

        <div class="col-sm-12 col-lg-3 col-6">
            <x-adminlte-small-box title="{{ $countCategories }}" text="Категории" icon="fas fa-chart-pie"
                                  theme="danger" url="#" url-text="More info"/>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            @include("blog.admin.main.partials.orders")
        </div>
        <div class = "col-12 col-md-6">
            @include("blog.admin.main.partials.recently")
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
