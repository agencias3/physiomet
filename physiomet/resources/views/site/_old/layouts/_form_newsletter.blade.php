<div class="display-inline-block w-350-px f-none m-left-70-px m-left-1200-30-px w-1024-100 m-top-1024-30">
    {!! Form::open(['route' => 'newsletter.store', 'class' => 'w-100', 'id' => 'fNewsletter']) !!}
        <label class="w-100 f-size-1024-16" for="newsletter-email">
            Seja um empreendedor atualizado.
            Assine nossa Newsletter
        </label>
        <fieldset class="w-100 m-top-20">
            <input type="email" id="newsletter-email" name="email" placeholder="E-mail *" required />
        </fieldset>
        <fieldset class="w-100 m-top-20 send-newsletter">
            <input class="smooth pointer" type="submit" id="send-newsletter" value="Cadastrar" />
        </fieldset>
        <div class="def-msg w-100 m-top-30 f-size-16 t-align-c"></div>
    {!! Form::close() !!}
</div>