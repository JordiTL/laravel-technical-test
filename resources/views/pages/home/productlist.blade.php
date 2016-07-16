<section class="col-md-12">
    <div class="title-container">
        <h2 class="section-title">Products</h2>
    </div>

    <div>
        <div class="col-product col-md-12">
            <div class="subtitle-container">
                <h3 class="subsection-title">The most expensive products</h3>
            </div>
            <div>
                @foreach ($expensiveProducts as $product)
                    <div class="col-md-15 card">
                        <div class="card-inner">
                            <div class="card-overlay
                            @if ($product->isWished())
                                selected
                            @endif
                            ">
                                <a href="{{ url('product/'.$product->id.'/togglewish') }}" class="btn btn-card"><img class="btn-img" src="{{ elixir('images/icon-wish.svg') }}"></a>
                            </div>
                            <img src="{{ $product->image }}">
                        </div>
                        <div class="card-details">
                            <h4>{{ $product->name }}</h4>
                            <p><span class="price">€ {{ $product->price }}</span></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-product col-md-12">
            <div class="subtitle-container">
                <h3 class="subsection-title">The cheapest products</h3>
            </div>
            <div>
                @foreach ($cheapProducts as $product)
                    <div class="col-md-15 card">
                        <div class="card-inner">
                            <div class="card-overlay
                            @if ($product->isWished())
                                    selected
                                @endif
                                    ">
                                <a href="{{ url('product/'.$product->id.'/togglewish') }}" class="btn btn-card"><img class="btn-img" src="{{ elixir('images/icon-wish.svg') }}"></a>
                            </div>
                            <img src="{{ $product->image }}">
                        </div>
                        <div class="card-details">
                            <h4>{{ $product->name }}</h4>
                            <p><span class="price">€ {{ $product->price }}</span></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>