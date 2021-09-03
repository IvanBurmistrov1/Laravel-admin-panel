@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Панель управления</h1>
@stop
@php
    $heads = [
        'ID',
        'Покупатель',
        'Статус',
        'Cумма',
        'Дата создания',
        'Дата изменения',
        'Действия'
    ];
@endphp
@section('content')
    <section class="component">
        <div class="row">
            <div class="col-md-12">
                <x-adminlte-card title="Заказы" theme="lightblue" icon="fas fa-lg fa-shopping-cart" theme-mode="outline"
                                 maximizable>
                    <x-adminlte-datatable id="table1" :heads="$heads" hoverable>
                        @forelse($orders as $order)
                            @php $order_row_class = $order->status ? 'success':'' @endphp
                            <tr>
                                <td><a href="">{{$order->id}}</a></td>
                                <td><a href="">{{ucfirst($order->name)}}</a></td>
                                <td><span class="badge badge-success">
                                    @if ($order->status == 0) Новый @endif
                                        @if ($order->status == 1) Завершен @endif
                                        @if ($order->status == 2) Удален @endif
                                    </span></td>
                                <td>{{$order->sum}} {{ $order->currency }}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->updated_at}}</td>
                                <td>
                                    <a href="{{route('blog/admin.orders.edit',$order->id)}}" title="редактировать заказ"><i class="fa fa-fw fa-eye"></i></a>
                                    <a href="" title="удалить из БД"><i
                                            class="ion ion-close text-danger deletebd"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center"><h2 class="text-center"> заказов нет</h2></td>
                            </tr>
                        @endforelse
                    </x-adminlte-datatable>
                    <div class="text-center">
                        <p>{{count($orders)}} заказа(ов) из {{$countOrders}}</p>
                        @if($orders->total() > $orders->count())
                        <div class="row justify-content-center">
                                {{$orders->links()}}
                        </div>

                        @endif
                    </div>
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
