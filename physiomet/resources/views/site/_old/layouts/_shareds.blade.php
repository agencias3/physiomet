<nav class="w-100 m-top-20 t-align-c">
    <ul class="display-inline-block c-left">
        <li class="m-top-20">
            <a href="https://www.facebook.com/sharer.php?u={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="Facebook">
                <img src="{{ asset('assets/site/images/icons/icon-social-1.png') }}" title="Facebook" alt="Facebook">
            </a>
        </li>
        <li class="m-top-20 m-left-10-px">
            <a href="http://twitter.com/home?status={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="Twitter">
                <img src="{{ asset('assets/site/images/icons/icon-social-2.png') }}" title="Twitter" alt="Twitter">
            </a>
        </li>
        <li class="m-top-20 m-left-10-px">
            <a href="https://plus.google.com/share?url={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="GooglePlus">
                <img src="{{ asset('assets/site/images/icons/icon-social-3.png') }}" title="GooglePlus" alt="GooglePlus">
            </a>
        </li>
        <li class="m-top-20 m-left-10-px">
            <a href="whatsapp://send?text={{ Route::getCurrentRequest()->getUri() }}" target="_blank" title="WhatsApp">
                <img src="{{ asset('assets/site/images/icons/icon-social-4.png') }}" title="WhatsApp" alt="WhatsApp">
            </a>
        </li>
    </ul>
</nav>