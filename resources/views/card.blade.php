<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">


        </div>
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
        <div class="caption">

            <h3>{{ $product->name }}</h3>

            <p>{{ $product->price }} руб.</p>

            <p>
                <h4>{{ $product->category->name }}</h4>
                <hr>
            <form action="{{ route('basket') }}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                <a href="{{route('product', [$product->category->code, $product->code])}}" class="btn btn-default" role="button">Подробнее</a>
                <input type="hidden" name="_token" value="kl4dkt26jzaasYQBTpBYO9myFLI2ewKz22h3ZOix">
            </form>
            </p>
        </div>
    </div>
</div>
