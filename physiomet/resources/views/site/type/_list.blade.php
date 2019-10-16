@if(!$types->isEmpty())
<ul class="w-100 m-top-50 slider-slick-4 list-group-1 m-top-1024-0">
    @foreach($types as $row)
    <li class="f-left">
        <a class="d_flex w-100 h-100 direction-column justify-center bg-white b-radius-20" href="{{ route('type.show', $row->seo_link) }}" title="{{ $row->name }}">
            <figure class="self-center">
                <img class="f-left" src="{{ asset('uploads/type/'.$row->image) }}" title="{{ $row->name }}" alt="{{ $row->name }}" />
            </figure>
            <span class="m-top-25 main-color f-size-22">
                {{ $row->name }}
            </span>
        </a>
    </li>
    @endforeach
</ul>
@endif