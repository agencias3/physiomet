@if(!$services->isEmpty())
    <div class="w-100 m-top-80 container w-1024-100 m-top-1024-30">
        <h2 class="w-100 title">
            SERVIÇOS
        </h2>
    </div>
    <article class="w-100 d_flex wrap justify-center list-group-2">
        @foreach($services as $row)
            <?php
            $cover = '';
            $image = $row->images->firstWhere('cover', 'y');
            if(isPost($image)){
                $cover = asset('uploads/service/'.$image->image);
            }
            ?>
        <div class="item w-600-100">
            <a class="w-100 relative" href="{{ route('service.show', $row->seo_link) }}" title="{{ $row->name }}">
                @if($cover)
                <img class="w-100 relative z-index-1" src="{{ $cover }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
                @endif
                <div class="w-100 absolute z-index-2 bottom-0 left-0">
                    <div class="w-100 h-100 display-table">
                        <div class="inline">
                            <span class="w-100">
                                {{ $row->name }}
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </article>
@endif