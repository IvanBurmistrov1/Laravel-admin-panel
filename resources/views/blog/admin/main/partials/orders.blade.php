@php
    $heads = [
        'ID',
        'Покупатель',
        'Статус',
        'Cумма',
    ];
@endphp

<x-adminlte-card title="Последние заказы" theme="lightblue" icon="fas fa-lg fa-bell" theme-mode="outline" collapsible
                 removable maximizable>
    <x-adminlte-datatable id="table1" :heads="$heads"  hoverable >
        @foreach($lastOrders as $order)
            <tr>
                <td><a href="">{{$order->id}}</a></td>
                <td><a href="">{{ucfirst($order->name)}}</a></td>
                <td><span class="badge badge-success">
                        @if ($order->status == 0) Новый @endif
                        @if ($order->status == 1) Завершен @endif
                        @if ($order->status == 2) Удален @endif
                    </span></td>
                <td>{{$order->sum}}</td>
            </tr>
        @endforeach
    </x-adminlte-datatable>
</x-adminlte-card>
