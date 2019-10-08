{!! Form::open(['route' => 'contact.store', 'class' => 'w-100 form', 'id' => 'fContact']) !!}
    <fieldset class="w-48 m-top-20 w-800-100">
        <input type="text" id="contact-name" placeholder="Nome completo: *" name="name" required />
    </fieldset>
    <fieldset class="w-48 f-right m-top-20 w-800-100">
        <input class="masked-phone" type="text" id="contact-phone" placeholder="Telefone: *" name="phone" required />
    </fieldset>
    <fieldset class="w-48 m-top-20 w-800-100">
        <input type="text" id="contact-email" placeholder="E-mail: *" name="email" required />
    </fieldset>
    <?php
    $subject = '';
    $page = Route::getCurrentRoute()->uri();
    if($page == 'compramos-seu-terreno'){
        $subject = 'Compramos seu terreno';
    }
    ?>
    <fieldset class="w-48 f-right m-top-20 w-800-100">
        <input type="text" id="contact-subject" placeholder="Assunto *" name="subject" value="{{ $subject }}" required />
    </fieldset>
    <fieldset class="w-100 m-top-20">
        <textarea id="contact-message" placeholder="Compartilhe conosco quais as suas necessidades e tire suas dúvidas *" name="message" required></textarea>
    </fieldset>
    <fieldset class="w-100 m-top-30 t-align-c box-submit send-contact">
        <input class="display-inline-block pointer smooth" type="submit" id="send-contact" value="Enviar" />
    </fieldset>
    <div class="def-msg w-100 m-top-30 f-size-16 t-align-c"></div>
{!! Form::close() !!}