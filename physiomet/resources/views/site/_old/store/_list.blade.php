<?php
$cover = asset('assets/site/images/not-image.png');
$image = $row->images->firstWhere('cover', 'y');
if(isPost($image)){
    $cover = asset('uploads/store/'.$image->image);
}
?>
<li class="f-left d_flex">
    <a href="{{ route('store.show', ['enterprise' => $row->enterprise->seo_link, 'seo_link' => $row->seo_link]) }}" title="{{ $row->name }}">
        <div class="w-100 t-align-c">
            <div class="display-inline-block w-180-px f-none relative marker-list">
                <div class="w-100 relative z-index-2 d_flex">
                    <span class="w-100">
                        {{ $row->enterprise->name }}
                    </span>
                </div> 
            </div>
        </div>
        <span class="w-100 m-top-30 t-align-c f-w-500 color-grey f-size-20">
            {{ $row->name }}
        </span>
        @if(isPost($cover))
            <?php
			/**
				.tag-1 = últimas unidades
				.tag-2 = alugado
			*/
                $tag = '';
                if($row->tag == 'rent'){
                    $tag = 'tag-2';
                }elseif($row->tag == 'last_units'){
                    $tag = 'tag-1';
                }
            ?>
			<figure class="w-100 m-top-20 {{ $tag }}">
				<div class="w-100 h-100" style="background: url({{ $cover }}) no-repeat;background-position: center center;background-size: cover;"></div>
			</figure>
        @endif
        @if(isPost($row->price) || isPost($row->dimension) || isPost($row->enterprise->district))
        <div class="w-100 options d_flex">
            @if(isPost($row->price))
                <div class="t-align-c">
                    <figure class="w-100">
                        <img class="display-inline-block max-w-100" height="40" src="{{ asset('assets/site/images/icons/icon-3.png') }}" title="Valor" alt="Valor" />
                    </figure>
                    <span class="w-100 m-top-10 f-w-500 f-size-16">
                        R$ {{ formata_valor($row->price) }}
                    </span>
                </div>
            @endif
            @if(isPost($row->dimension))
                <div class="t-align-c">
                    <figure class="w-100">
                        <img class="display-inline-block max-w-100" height="40" src="{{ asset('assets/site/images/icons/icon-5.png') }}" title="Dimensão" alt="Dimensão" />
                    </figure>
                    <span class="w-100 m-top-10 f-w-500 f-size-16">
                        {{ $row->dimension }} <b>(m2)</b>
                    </span>
                </div>
            @endif
            @if(isPost($row->enterprise->district))
                <div class="t-align-c">
                    <figure class="w-100">
                        <img class="display-inline-block max-w-100" height="40" src="{{ asset('assets/site/images/icons/icon-4.png') }}" title="Bairro" alt="Bairro" />
                    </figure>
                    <span class="w-100 m-top-10 f-w-500 f-size-16">
                        {{ $row->enterprise->district }}
                    </span>
                </div>
            @endif
        </div>
        @endif
        <div class="w-100 m-top-20 t-align-c">
            <span class="display-inline-block b-radius-5 secondary-bg see-more">
				Quero saber mais
            </span>
        </div>
    </a>
</li>