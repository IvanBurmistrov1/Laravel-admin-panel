@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> Редактироавать заказ № {{ $order->id }}
        @if(!$order->status)
            <a href="{{route('blog.admin.orders.change',$order->id)}}/?status=1" class="btn btn-success btn-xs">Одобрить</a>
            <a href="#" class="btn btn-warning btn-xs redact">Редактировать</a>
        @else
            <a href="{{route('blog.admin.orders.change',$order->id)}}/?status=0" class="btn btn-success btn-xs">Вернуть
                на доработку</a>
        @endif
        <a class="btn btn-xs" href="">
            <form id="delform" method="post" action="{{--{{route('blog.admin.orders.destroy',$order->id)}}--}}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-xs delete">Удалить</button>
            </form>
        </a>

    </h1>
@stop
@php
    $heads = [
        'ID',
        'Наименование',
        'Кол-во',
        'Цена',

    ];
@endphp
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <x-adminlte-card theme="light" theme-mode="outline">
                    <div class="table-responsive">
                        <form action="{{route('blog.admin.orders.save',$order->id)}}" method="post">
                            @csrf
                            <table class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td>Номер Заказа</td>
                                    <td>{{$order->id}}</td>
                                </tr>
                                <tr>
                                    <td>Дата Заказа</td>
                                    <td>{{$order->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Дата изменения</td>
                                    <td>{{$order->updated_at}}</td>
                                </tr>
                                <tr>
                                    <td>Кол-во позиций в заказе</td>
                                    <td>{{count($orderProducts)}}</td>
                                </tr>
                                <tr>
                                    <td>Сумма</td>
                                    <td> {{$order->sum}} {{$order->currency}}</td>
                                </tr>
                                <tr>
                                    <td>Имя заказчика</td>
                                    <td>{{$order->name}}</td>
                                </tr>
                                <tr>
                                    <td>Статус</td>
                                    <td>{{$order->status ? 'Завершен' : 'Новый'}}</td>
                                </tr>
                                <tr>
                                    <td>Комментарий</td>
                                    <td>
                                        <input type="text" value="@if(isset($order->note)) {{$order->note}} @endif"
                                               placeholder="@if(!isset($order->note)) Комментариев нет @endif">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <input type="submit" name="submit" class="btn btn-warning" value="Сохранить">
                        </form>
                    </div>
                </x-adminlte-card>
                <h3>Детали заказа</h3>
                <x-adminlte-card theme="light" theme-mode="outline">
                    <x-adminlte-datatable id="table1" :heads="$heads" hoverable>
                        @php $qty=0 @endphp
                        @foreach($orderProducts as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->qty,$qty+=$product->qty }}</td>
                                <td>{{$product->price}}</td>
                            </tr>
                        @endforeach
                        <tr class="active">
                            <td colspan="2">
                                <b>Итого:</b>
                            </td>
                            <td>
                                <b>{{$qty}}</b>
                            </td>
                            <td>
                                <b>{{$order->sum}} {{$order->currency}}</b>
                            </td>
                        </tr>
                    </x-adminlte-datatable>
                </x-adminlte-card>
            </div>
        </div>

    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
