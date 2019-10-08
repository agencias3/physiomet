@if(!$images->isEmpty())
    <section class="d_flex">
        <div class="w-100">
            <?php $cover = $images->firstWhere('cover', 'y'); ?>
            <figure class="w-100 main-image @if(count($images) > 1) display-600-none @endif" style="background: url({{ asset('uploads/'.$path.'/'.$cover->image) }}) no-repeat;background-size: cover;background-position: center center;"	>
                <a class="w-100 h-100 relative html5lightbox" data-group="0" href="{{ asset('uploads/'.$path.'/'.$cover->image) }}" title="{{ $cover->label }}" >
                    <!--img class="w-100" src="{{ asset('uploads/'.$path.'/'.$cover->image) }}" title="{{ $cover->label }}" alt="{{ $cover->label }}" /-->
                    <img class="absolute z-index-2 bottom-0 right-0" style="bottom: 0;margin: 0 30px 30px 0;" src="{{ asset('assets/site/images/icons/search.png') }}" title="Zoom" alt="Zoom" />
                </a>
            </figure>
            @if(count($images) > 1)
                <ul class="f-left slider-slick-3 list-gallery">
                    <?php $i = 0; ?>
                    @foreach($images as $image)
                        <?php $i++;
                        $cover = false;
                        if($image->cover == 'y'){
                            $cover = true;
                        }
                        ?>
                        <li class="f-left">
                            <figure class="w-100 relative">
                                <a class="w-100 h-200-px h-1024-150-px relative z-index-1 @if($cover) active @endif" style="background: url({{ asset('uploads/'.$path.'/'.$image->image) }}) no-repeat;background-size: cover;background-position: center center;" href="javascript:void(0);" data-href="{{ asset('uploads/'.$path.'/'.$image->image) }}" onclick="altImage($(this))" title="{{ $image->label }}">
                                    <!--img class="w-100 display-none" src="{{ asset('uploads/'.$path.'/'.$image->image) }}" title="{{ $image->label }}" alt="{{ $image->label }}" /-->
                                </a>
                                <a class="w-100 h-100 absolute top-0 left-0 z-index-2 display-none display-600-block html5lightbox" data-group="group1" href="{{ asset('uploads/'.$path.'/'.$image->image) }}" title="{{ $image->label }}"></a>
                            </figure>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </section>
@endif