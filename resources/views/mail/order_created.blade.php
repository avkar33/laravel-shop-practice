name {{$name}}


<ul>
    @foreach ($products as $product)
        <li>{{$product->name}}</li>
        <li>{{$product->price}}</li>
        <li>{{$product->pivot->count}}</li>
    @endforeach
</ul>

<p>sum {{$fullSum}}</p>
