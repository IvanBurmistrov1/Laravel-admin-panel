@php
    $heads = [
        'ID',
        'Покупатель',
        'Статус',
        'Cумма',
    ];
@endphp

<x-adminlte-card title="Последние товары" theme="lightblue" icon="fas fa-lg fa-bell" theme-mode="outline" collapsible
                 removable maximizable>
    <ul class="products-list products-list-in-box">
        @foreach($lastProducts as $product)
            <li class="item">
                <div class="product-img">
                    @if(!empty($product->img))
                        <img src="{{asset('images/uploads/single/'.$product->img)}}" alt="Image">
                    @else
                        <img src="{{asset('image/no_image.png')}}" alt="Image">
                    @endif
                </div>
                <div class="product-info">
                    <a href="" class="product-title">
                        {{$product->title}}
                        <span class="badge badge-warning pull-right">{{$product->price}}$</span>
                        <span class="product-description">{{$product->description}}</span>
                    </a>
                </div>
            </li>
        @endforeach

    </ul>


</x-adminlte-card>
