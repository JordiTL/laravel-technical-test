<section class="col-md-12 wishlist">
    <div class="title-container">
        <h2 class="section-title"> My Wishlist</h2>
    </div>

    <div>
        <div class="col-product col-md-12">
            <div class="subtitle-container">
                <h3 class="subsection-title">Wished</h3>
            </div>
            <div>
                @foreach ($wishedProducts as $product)
                    <div class="col-sm-2 col-md-2 col-lg-2 card">
                        <a class="boxclose" id="boxclose"></a>
                        <div class="card-inner">
                            <div class="card-overlay">
                                <a href="{{ url('product/'.$product->id.'/unwish') }}" class="btn btn-card"><img class="btn-img" src="{{ elixir('images/close.svg') }}"></a>
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