@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(3); ?>
    @include('site.layouts._header_page', ['id' => 3, 'image' => asset('uploads/page/'.session()->get('page')[3]['banner'])])
    <section class="w-100 m-top-3 content">
        <div class="w-100 p-top-50 p-bottom-50 p-top-1024-20 p-bottom-1024-30">
            <div class="center-2">
                @include('site.layouts.bread-crumbs')
                @if($faqs->isEmpty())
                    <div class="w-80 m-top-50 m-left-10 f-size-20 t-align-c w-1024-100 m-top-1024-30">Nenhuma dúvida frequente cadastradas!</div>
                @else
                <ul class="w-80 m-top-50 m-left-10 list-group-faq w-1024-100 m-top-1024-30">
                    <?php $cont = 0; ?>
                    @foreach($faqs as $row)
                        <?php $cont++; ?>
                    <li class="w-100 @if($cont == 1) active @endif">
                        <a class="w-100 c-left d_flex" href="javascript:void(0);" onclick="openList($(this))" title="Abrir">
                            <span>
                                {!! $row->name !!}
                            </span>
                            <b>▼</b>
                            <b class="display-none">▲</b>
                        </a>
                        <div class="w-100">
                            <div class="w-100 text">
                                {!! $row->description !!}
                            </div>
							<div class="w-100 c-left m-top-20">
								<span class="m-top-10 color-black f-size-16">
									Essa informação foi útil?
								</span>
                                <div id="likeOrNotLike-{{ $row->id }}">
                                    <a class="m-left-20-px btnFaq" data-id="{{ $row->id }}" data-type="y" href="javascript:void(0);" title="Sim">
                                        <img src="{{ asset('assets/site/images/icons/like.png') }}" title="Sim" alt="Sim" />
                                    </a>
                                    <a class="m-left-15-px btnFaq" data-id="{{ $row->id }}" data-type="n" href="javascript:void(0);" title="Não">
                                        <img src="{{ asset('assets/site/images/icons/deslike.png') }}" title="Não" alt="Não" />
                                    </a>
                                </div>
							</div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </section>
@endsection