@if(!$products->isEmpty())
    <section class="w-100 p-top-70 p-bottom-70 p-top-1024-30 p-bottom-1024-30">
        <div class="center-2">
            <h1 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
                Nossos Principais Produtos
            </h1>
            <div class="w-100 d_flex wrap justify-center list-group column-600" data-scroll-reveal="enter bottom move 50px">
                @foreach($products as $row)
                    <div class="item t-align-c">
                        @if(isPost($row->icon))
                            <figure class="w-100">
                                <img class="max-w-100" src="{{ asset('uploads/category/'.$row->icon) }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
                            </figure>
                        @endif
                        <strong class="w-100 m-top-30 f-w-800 secondary-color-1 f-size-24 f-size-1024-20">
                            {{ $row->name }}
                        </strong>
                        <div class="w-100 m-top-25 text">
                            {!! $row->resume !!}
                        </div>
                        <div class="w-100 m-top-20">
                            <a class="display-inline-block main-bg smooth see-more" href="{{ route('product.category', $row->seo_link) }}" title="Ver Mais">
                                Ver Mais
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif