<span class="w-100 color-white f-size-16 font-2">
    NEWSLETTER
</span>
{!! Form::open(['route' => 'newsletter.store', 'class' => 'w-100 m-top-25 form-newsletter', 'id' => 'fNewsletter']) !!}
    <label class="w-100" for="newsletter-email">
        Assine para receber novidades por e-mail!
    </label>
    <fieldset class="w-100 m-top-15 d_flex b-radius-50 overflow-h">
        <input class="flex-1" type="email" id="newsletter-email" name="email" placeholder="physiomet@physiomet.com.br *" required />
        <input type="submit" id="send-newsletter" value="" />
    </fieldset>
    <div class="def-msg w-100 m-top-30 f-size-16 t-align-c"></div>
{!! Form::close() !!}