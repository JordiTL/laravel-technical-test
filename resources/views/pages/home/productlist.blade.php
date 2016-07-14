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
                @for ($i = 0; $i < 10; $i++)
                    <div class="col-md-15 card">
                        <div class="card-inner">
                            <div class="card-overlay">
                                <a class="btn btn-card"><img class="btn-img" src="{{ elixir('images/icon-wish.svg') }}"></a>
                            </div>
                            <img src="{{ elixir('images/slide-office.jpg') }}">
                        </div>
                        <div class="card-details">
                            <h4>This is a title</h4>
                            <p><span class="price">48$</span></p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <div class="col-product col-md-12">
            <div class="subtitle-container">
                <h3 class="subsection-title">The cheapest products</h3>
            </div>
            <div>
                @for ($i = 0; $i < 10; $i++)
                    <div class="col-md-15 card">
                        <div class="card-inner">
                            <div class="card-overlay">
                                <a class="btn btn-card"><img class="btn-img" src="{{ elixir('images/icon-wish.svg') }}"></a>
                            </div>
                            <img src="{{ elixir('images/slide-office.jpg') }}">
                        </div>
                        <div class="card-details">
                            <h4>This is a title</h4>
                            <p><span class="price">48$</span></p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>