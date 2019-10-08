@inject("store", "\AgenciaS3\Http\Controllers\Site\StoreController")
<?php
$minPrice = $store->getByMinPrice();
$maxPrice = $store->getByMaxPrice();
$minDimension = $store->getByMinDimension();
$maxDimension = $store->getByMaxDimension();
?>
<link rel="stylesheet" href="{{ asset('assets/site/css/jquery-ui.css') }}" type="text/css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php
$minDimensionInput = floor($minDimension);
$maxDimensionInput = ceil($maxDimension);
$minPriceInput = $minPrice;
$maxPriceInput = $maxPrice;
if(isset($request) && isPost($request->minPrice)){
    $minPriceInput = trataCampoValor($request->minPrice);
    //dd(trataValueCents(trataCampoValor($request->minPrice)));
}
if(isset($request) && isPost($request->maxPrice)){
    $maxPriceInput = trataCampoValor($request->maxPrice);
}
if(isset($request) && isPost($request->minDimension)){
    $minDimensionInput = explode(' m²', $request->minDimension);
    $minDimensionInput = $minDimensionInput[0];
}
if(isset($request) && isPost($request->maxDimension)){
    $maxDimensionInput = explode(' m²', $request->maxDimension);
    $maxDimensionInput = $maxDimensionInput[0];
}

$minPriceInput = trataValueCents($minPriceInput);
$minPriceInputSet = trataValueCents($minPrice);
$maxPriceInput = trataValueCents($maxPriceInput);
$maxPriceInputSet = trataValueCents($maxPrice);
?>
<script>
    $( function() {
		$( "#slider-range" ).slider({
			range: true,
			min: <?php echo $minPriceInputSet; ?>,
			max: <?php echo $maxPriceInputSet; ?>,
			values: [ '<?php echo $minPriceInput; ?>', '<?php echo $maxPriceInput; ?>'],
			slide: function( event, ui ) {
				$( ".money-1" ).val(ui.values[ 0 ]);
				$( ".money-2" ).val(ui.values[ 1 ]);

				$('.masked-money').mask('000.000.000.000.000,00', {reverse: true});
			}
		});
        $( "#slider-range2" ).slider({
            range: true,
            min: <?php echo floor($minDimension); ?>,
            max: <?php echo ceil($maxDimension); ?>,
            values: [ '<?php echo $minDimensionInput; ?>', '<?php echo $maxDimensionInput; ?>'],
            slide: function( event, ui ) {
                $( ".mt-1" ).val(ui.values[ 0 ] + ' m²');
                $( ".mt-2" ).val(ui.values[ 1 ] + ' m²');
            }
        });
    } );
</script>
<section class="w-100 @if($call) p-top-80 p-bottom-80 @endif bg-white-2 p-top-1024-30 p-bottom-1024-30">
    <div class="center-2">
        @if($call)
        <!--figure class="w-100 t-align-c">
            <img class="display-inline-block" src="{{ asset('assets/site/images/icons/pin-1.png') }}" title="" alt="" />
        </figure-->
        <h1 class="w-100 t-align-c l-height-14 t-upper f-w-800 f-size-55 f-size-1024-30 f-size-600-20">
            encontre a melhor loja<br />
            para instalar seu negócio
        </h1>
        @endif
        <form class="w-100 w-1800-90 m-left-1800-5 form-filter w-1024-100" method="get" action="{{ route('store') }}" autocomplete="off">
            <div class="w-100 relative m-top-20 d_flex m-top-1024-0">
                <div class="items-content type-1 t-align-c">
                    <figure class="w-100">
                        <img class="display-inline-block max-w-100" src="{{ asset('assets/site/images/icons/icon-3.png') }}" title="Preço" alt="Preço" />
                    </figure>
                    <span class="w-100 m-top-25 f-w-500 f-size-20 f-size-1024-16">
                        Preço
                    </span>
                    <div class="w-100 m-top-30 box-input">
						<fieldset>
							<input class="money-1 masked-money" name="minPrice" type="text" readonly value="<?php echo $minPriceInput; ?>" placeholder="" />
						</fieldset>
						<fieldset>
							<input class="money-2 masked-money" name="maxPrice" type="text" readonly value="<?php echo $maxPriceInput; ?>" placeholder="" />
						</fieldset>
                    </div>
                    <div class="w-100 relative m-top-30">
                        <div id="slider-range" data-min="353250"  data-max="6454140"></div>
                    </div>
                </div>
                <div class="items-content type-2 t-align-c">
                    <figure class="w-100">
                        <img class="display-inline-block max-w-100" src="{{ asset('assets/site/images/icons/icon-4.png') }}" title="Localização" alt="Localização" />
                    </figure>
                    <span class="w-100 m-top-25 f-w-500 f-size-20 f-size-1024-16">
                            Localização
                        </span>
                    <div class="w-100 m-top-30 box-address">
                        <input class="w-100" type="text" name="address" @if(isset($request) && isPost($request->address)) value="{{ $request->address }}" @endif placeholder="Digite a localização ou nome" />
                    </div>
                </div>
                <div class="items-content type-1 t-align-c">
                    <figure class="w-100">
                        <img class="display-inline-block max-w-100" src="{{ asset('assets/site/images/icons/icon-5.png') }}" title="" alt="" />
                    </figure>
                    <span class="w-100 m-top-25 f-w-500 f-size-20 f-size-1024-16">
                            Metragem <b>(m2)</b>
                        </span>
                    <div class="w-100 m-top-30 box-input">
                        <input class="mt-1" type="text" name="minDimension" readonly value="{{ $minDimensionInput }} m²" placeholder="" />
                        <input class="mt-2" type="text" name="maxDimension" readonly value="{{ $maxDimensionInput }} m²" placeholder="" />
                    </div>
                    <div class="w-100 relative m-top-30">
                        <div id="slider-range2" data-min="{{ $minDimensionInput }}"  data-max="{{ $maxDimensionInput }}"></div>
                    </div>
                </div>
				<div class="absolute top-0 left-100 m-left-30-px-neg bt-reset w-1024-100 left-1024-0 top-1024-100 m-top-1024-30">
					@if(Route::getCurrentRoute()->uri() == 'home' || Route::getCurrentRoute()->uri() == '/')
					<div class="relative f-left display-inline-block f-1024-n">
						<span class="f-left m-top-10 h-100 relative z-index-1 l-height-14 t-align-r l-spac-1 f-w-700 color-red f-size-16">
							Limpar busca
						</span>
						<input class="w-100 h-100 absolute top-0 left-0 z-index-2 opacity-0 pointer" type="reset" onclick="resetSlider()" />
					</div>
					@else
					<a class="relative f-left display-inline-block f-1024-n" href="{{ route('store') }}" title="Limpar busca">
						<span class="f-left m-top-10 h-100 relative z-index-1 l-height-14 t-align-r l-spac-1 f-w-700 color-red f-size-16">
							Limpar busca
						</span>
					</a>
					@endif
				</div>
            </div>
            <div class="w-100 m-top-80 t-align-c m-top-1024-30">
                <div class="display-inline-block bt-send">
                    <div class="f-left relative">
                            <span class="w-100 h-100 absolute z-index-1 top-0 left-0 b-radius-5 secondary-bg smooth">
                                <p class="w-100 m-top-10">
                                    <b class="display-inline-block m-top-8 l-spac-1 f-w-700 color-white f-size-16 smooth">
                                        Buscar
                                    </b>
                                    <img class="display-inline-block m-left-10-px" src="{{ asset('assets/site/images/icons/search.png') }}" title="" alt="" />
                                </p>
                            </span>
                        <input class="relative z-index-2 opacity-0 pointer" type="submit" value="Buscar" />
                    </div>
                </div>
                <!--div class="display-inline-block m-left-30-px bt-reset">
                    <div class="f-left relative">
                            <span class="w-100 h-100 absolute z-index-1 top-0 left-0 b-radius-5">
                                <p class="w-100 m-top-10">
                                    <b class="display-inline-block m-top-8 l-spac-1 f-w-700 color-red f-size-16">
                                        Limpar busca
                                    </b>
                                </p>
                            </span>
                        <input class="relative z-index-2 opacity-0 pointer" type="reset" />
                    </div>
                </div-->
            </div>
        </form>
    </div>
</section>