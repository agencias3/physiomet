<?php
$cover = asset('assets/site/images/not-image.png');
$image = $row->images->firstWhere('cover', 'y');
if(isPost($image)){
    $cover = asset('uploads/enterprise/'.$image->image);
}
?>
<li class="f-left d_flex">
    <a href="{{ route('enterprise.show', ['seo_link' => $row->seo_link]) }}" title="{{ $row->name }}">
        <div class="w-100 t-align-c">
            <div class="display-inline-block w-180-px f-none relative marker-list">
                <div class="w-100 relative z-index-2 d_flex">
                    <span class="w-100">
                        {{ $row->name }}
                    </span>
                </div> 
            </div>
        </div>
        @if(isPost($cover))
			<!-- 
				.tag-1 = últimas unidades
				.tag-2 = alugado
			-->
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
        <div class="w-100 options d_flex">
            <div class="t-align-c">
                <figure class="w-100">
                    <img class="display-inline-block max-w-100" height="40" src="{{ asset('assets/site/images/icons/icon-4.png') }}" title="Bairro" alt="Bairro" />
                </figure>
                <span class="w-100 m-top-15 l-height-16 f-w-500 color-grey-2 f-size-18">
                    <?php
                    if(isPost($row->street)){
                        echo $row->street;
                    }
                    if(isPost($row->number)){
                        echo ', '.$row->number;
                    }
                    if(isPost($row->district)){
                        echo '<br />'.$row->district;
                    }
                    if(isPost($row->zip_code)){
                        echo '<br />CEP '.$row->zip_code;
                    }
                    if(isPost($row->state)){
                        echo ' - '.$row->state;
                    }
                    if(isPost($row->city)){
                        echo ' '.$row->city;
                    }
                    ?>
                </span>
            </div>
        </div>
        <div class="w-100 m-top-20 t-align-c bt">
            <span class="display-inline-block b-radius-3 secondary-bg see-more">
				Quero saber mais
            </span>
        </div>
    </a>
</li>