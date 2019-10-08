@extends('site.layouts.app')
@section('content')
    <section class="w-100 p-top-50 p-bottom-50 p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            <h1 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20" data-scroll-reveal="enter bottom move 50px">
                Conheça Nossos Produtos
            </h1>
        </div>
    </section>
    <section class="w-100 p-bottom-50 bg-white-1 p-top-1024-0 p-bottom-1024-30">
        <div class="center">
            @if($categories->isEmpty())
                <div class="w-100 m-top-30 m-bottom-30 t-align-c f-size-20" data-scroll-reveal="enter bottom move 50px">
                    Nenhum produto encontrado!
                </div>
            @else
            <div class="w-100 d_flex wrap justify-center list-group list-group-edit w-1024-100">
                @foreach($categories as $row)
				<div class="item d_flex t-align-c">
					<div class="w-100 d_flex direction-column self-end">
						@if(isPost($row->icon))
						<figure class="w-100 m-bottom-30">
							<img class="max-w-100" src="{{ asset('uploads/category/'.$row->icon) }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
						</figure>
						@endif
						<div class="w-100 self-end">
							<strong class="w-100 f-w-800 secondary-color-1 f-size-24">
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
					</div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    @include('site.contact._form')
@endsection