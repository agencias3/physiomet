{!! Form::open(['route' => 'work.store', 'class' => 'display-inline-block form w-800-100', 'id' => 'fWork', 'files'=> true]) !!}
    <fieldset class="w-100">
        <input class="w-100" type="text" id="contact-name" name="name" placeholder="Nome *"required />
    </fieldset>
    <fieldset class="w-100 m-top-30">
        <input class="w-100 masked-phone" type="text" id="contact-phone" name="phone" placeholder="Telefone *" required />
    </fieldset>
    <fieldset class="w-100 m-top-30">
        <input class="w-100" type="email" id="contact-email" name="email" placeholder="E-mail *" required />
    </fieldset>
    <fieldset class="w-100 m-top-40 m-top-1024-30">
        <textarea class="w-100" id="contact-message" name="message" placeholder="Mensagem *" required></textarea>
    </fieldset>
    <fieldset class="w-100 m-top-30">
        <input class="w-100 input-file" type="file" id="work-file" name="file" placeholder="Anexar Currículo:" />
    </fieldset>
    <fieldset class="w-100 m-top-50 m-top-1024-30 send-contact">
        <input class="display-inline-block pointer see-more see-more-2 smooth w-600-100" type="submit" id="send-contact" value="Enviar Mensagem" />
    </fieldset>
    <div class="def-msg w-100 m-top-30 f-size-16 t-align-c"></div>
{!! Form::close() !!}