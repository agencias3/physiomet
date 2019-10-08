@if(isPost(session()->get('configuration')[3]['description']) || isPost(session()->get('configuration')[4]['description']))
    <div class="w-60 m-top-50 m-top-1024-0 w-600-100">
        @if(isPost(session()->get('configuration')[3]['description']))
            <div class="w-100 d_flex box-address-contact">
                <figure>
                    <img class="display-inline-block max-w-100" src="{{ asset('assets/site/images/icons/icon-6-white.png') }}" title="Telefone" alt="Telefone" />
                </figure>
                <figure class="display-none">
                    <img class="display-inline-block max-w-100" src="{{ asset('assets/site/images/icons/icon-6.png') }}" title="Telefone" alt="Telefone" />
                </figure>
                <span class="d_flex">
                    {!! session()->get('configuration')[3]['description'] !!}
                </span>
            </div>
        @endif
        @if(isPost(session()->get('configuration')[4]['description']))
            <div class="w-100 m-top-30 d_flex box-address-contact">
                <figure>
                    <img class="display-inline-block max-w-100" src="{{ asset('assets/site/images/icons/icon-7-white.png') }}" title="E-mail" alt="E-mail" />
                </figure>
                <figure class="display-none">
                    <img class="display-inline-block max-w-100" src="{{ asset('assets/site/images/icons/icon-7.png') }}" title="E-mail" alt="E-mail" />
                </figure>
                <span>
                    <a class="color-white t-decoration" href="mailto:{{ session()->get('configuration')[4]['description'] }}" title="{{ session()->get('configuration')[4]['description'] }}">
                        {!! session()->get('configuration')[4]['description'] !!}
                    </a>
                </span>
            </div>
        @endif
    </div>
@endif
@if(isPost(session()->get('configuration')[5]['description']) || isPost(session()->get('configuration')[6]['description']))
    <div class="f-right m-top-60 c-left m-top-1024-20 w-600-100 t-align-600-c">
        @if(isPost(session()->get('configuration')[5]['description']))
            <a class="display-inline-block relative bt-social f-600-n" href="{!! session()->get('configuration')[5]['description'] !!}" target="_blank" title="Facebook">
                <img class="smooth" width="55" src="{{ asset('assets/site/images/icons/fb.png') }}" title="Facebook" alt="Facebook" />
                <img class="opacity-0 absolute left-0 top-0 smooth" width="55" src="{{ asset('assets/site/images/icons/fb_mouseover.png') }}" title="Facebook" alt="Facebook" />
            </a>
        @endif
        @if(isPost(session()->get('configuration')[6]['description']))
            <a class="display-inline-block m-left-20-px relative bt-social f-600-n" href="{!! session()->get('configuration')[6]['description'] !!}" target="_blank" title="Instagram">
                <img class="smooth" width="55" src="{{ asset('assets/site/images/icons/ig.png') }}" title="Instagram" alt="Instagram" />
                <img class="opacity-0 absolute left-0 top-0 smooth" width="55" src="{{ asset('assets/site/images/icons/ig_mouseover.png') }}" title="Instagram" alt="Instagram" />
            </a>
        @endif
    </div>
@endif