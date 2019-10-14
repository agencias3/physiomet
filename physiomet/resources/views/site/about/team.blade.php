@if(!$teams->isEmpty())
<div class="w-100 m-top-80 container w-1024-100 m-top-1024-20">
    <h1 class="w-100 main-color l-height-14 f-size-30 font-3 t-align-1024-c f-size-1024-22">
        Conheça-nossos profissionais
    </h1>
</div>
<ul class="w-100 m-top-40 slider-slick-4 list-group-5 m-top-1024-60">
    @foreach($teams as $row)
    <li class="f-left">
        <div class="d_flex w-100 direction-column t-align-l" href="javascript:void(0);" title="{{ $row->name }}">
            <figure class="w-100 relative b-radius-10 overflow-h">
                <span class="w-100 h-100 absolute z-index-1 top-0 left-0" style="background: url('{{ asset('uploads/team/'.$row->image) }}') no-repeat;background-position: center center;background-size: cover;"></span>
                <div class="relative z-index-2 d_flex wrap box-content w-100 h-100">
                    @if(isPost($row->crefito) || isPost($row->email))
                    <div class="w-100 self-center display-none active">
                        <div class="w-100 color-white text">
                            <p>
                                @if(isPost($row->crefito))
                                <strong>CREFITO: {{ $row->crefito }}</strong><br />
                                @endif
                                @if(isPost($row->email))
                                email: <a href="mailto:{{ $row->email }}" title="{{ $row->email }}">{{ $row->email }}</a>
                                @endif
                            </p>
                        </div>
                    </div>
                    @endif
                    @if(isPost($row->description))
                    <div class="w-100 self-center display-none">
                        <div class="w-100 color-white text">
                            {!! $row->description !!}
                        </div>
                    </div>
                    @endif
                    @if(isPost($row->complement))
                    <div class="w-100 self-center display-none">
                        <div class="w-100 color-white text">
                            {!! $row->complement !!}
                        </div>
                    </div>
                    @endif
                </div>
                <div class="w-100 m-bottom-20 d_flex justify-center absolute z-index-3 bottom-0 left-0 pagination-gallery">
                    @if(isPost($row->crefito) || isPost($row->email))
                    <span class="active"></span>
                    @endif
                    @if(isPost($row->description))
                        @if(!isPost($row->crefito) && !isPost($row->email))
                            <span class="active"></span>
                        @else
                            <span></span>
                        @endif
                    @endif
                    @if(isPost($row->complement))
                        @if(!isPost($row->crefito) && !isPost($row->email) && isPost($row->description))
                            <span class="active"></span>
                        @else
                            <span></span>
                        @endif
                    @endif
                </div>
            </figure>
            <span class="m-top-25 main-color f-size-26 t-align-1024-c f-size-1024-20">
                {{ $row->name }}
            </span>
            @if(isPost($row->office))
            <span class="m-top-15 main-color-1 f-size-16 font-3 t-align-1024-c">
                {{ $row->office }}
            </span>
            @endif
        </div>
    </li>
    @endforeach
</ul>
@endif