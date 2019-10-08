<?php
$cover = asset('uploads/banner/top-page.jpg');
if(isset($image)){
    $cover = $image;
}
?>
<section class="w-100 relative top-page">
	<img class="w-100 relative z-index-1 display-1024-none" src="{{ asset('uploads/banner/banner-false.png') }}" title="{!! session()->get('page')[$id]['name'] !!}" alt="{!! session()->get('page')[$id]['name'] !!}" />
	<div class="absolute z-index-2 top-0 left-0 w-100 h-100 p-top-1024-30 p-bottom-1024-30 relative-1024" style="background: url('{{ $cover }}') no-repeat;background-size: cover;background-position: center center;">
		<div class="w-100 h-100 display-table">
			<div class="inline">
				<div class="w-100">
					<div class="center-2">
						<div class="w-80 m-left-10 w-1024-100 t-align-1024-c">
							<h1 class="w-100 l-height-14 t-upper f-w-800 color-white f-size-55 f-size-1200-40 f-size-1024-30 f-size-600-20">
								{!! session()->get('page')[$id]['name'] !!}
							</h1>
							<div class="w-50 h-4-px m-top-10 main-bg m-left-1024-25"></div>
							<div class="w-100 m-top-15 color-white text">
								<p>
									{!! session()->get('page')[$id]['sub_name'] !!}
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>