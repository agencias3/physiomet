@inject("objCovenant","\AgenciaS3\Http\Controllers\Site\CovenantController")
<?php $covenants = $objCovenant->getActives(); ?>
@if(!$covenants->isEmpty())
<section class="w-100 p-top-30 p-bottom-30 box-covenants">
    <div class="center">
        <article class="w-100 d_flex container w-1024-100 direction-1024-column">
            <section class="d_flex self-center w-1024-100">
                <h5 class="w-100 main-color title">
                    CONVÊNIOS
                </h5>
            </section>
            <aside class="flex-1 d_flex wrap list-group-4 justify-1024-center">
                @foreach($covenants as $row)
                <div class="item d_flex justify-center w-600-100">
                    <a class="self-center" href="@if(isPost($row->link_url)){{ $row->link_url }}@else javascript:void(0); @endif" target="_blank" title="{{ $row->name }}">
                        <img class="f-left max-w-100" src="{{ asset('uploads/covenant/'.$row->image) }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
                    </a>
                </div>
                @endforeach
            </aside>
        </article>
    </div>
</section>
@endif