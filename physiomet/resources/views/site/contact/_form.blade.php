@inject("objService","\AgenciaS3\Http\Controllers\Site\ServiceController")
{!! Form::open(['route' => 'contact.store', 'class' => 'w-100 m-top-40 d_flex wrap justify-space form m-top-1024-10 direction-800-column', 'id' => 'fContact']) !!}
    <fieldset class="flex-1 d_flex">
        <label class="d_flex justify-center self-center" for="contact-name">
            <img src="{{ asset('assets/site/images/label-1.png') }}" title="Nome" alt="Nome" />
        </label>
        <input class="flex-1" type="text" id="contact-name" name="name" placeholder="Nome *" required />
    </fieldset>
    <fieldset class="flex-1 d_flex">
        <label class="d_flex justify-center self-center" for="contact-email">
            <img src="{{ asset('assets/site/images/label-2.png') }}" title="E-mail" alt="E-mail" />
        </label>
        <input class="flex-1" type="email" id="contact-email" name="email" placeholder="E-mail *" required />
    </fieldset>
    <fieldset class="flex-1 d_flex">
        <label class="d_flex justify-center self-center" for="contact-phone">
            <img src="{{ asset('assets/site/images/label-3.png') }}" title="Telefone" alt="Telefone" />
        </label>
        <input class="flex-1 masked-phone" type="text" id="contact-phone" name="phone" placeholder="Telefone *" required />
    </fieldset>
    <fieldset class="flex-1 d_flex">
        <label class="d_flex justify-center self-center" for="contact-service">
            <img src="{{ asset('assets/site/images/label-4.png') }}" title="Serviço" alt="" />
        </label>
        <select class="flex-1" name="service_id" required>
            <option value="">
                Selecione um Serviço *
            </option>
            <?php $servicesContact = $objService->getActives(); ?>
            @if(!$servicesContact->isEmpty())
                @foreach($servicesContact as $row)
                    <?php
                    $selected = '';
                    if(Route::getCurrentRoute()->uri() == 'servicos/{seo_link}' && isset($service) && $service->id == $row->id){
                        $selected = 'selected';
                    }
                    ?>
                    <option value="{{ $row->id }}" {{ $selected }}>{{ $row->name }}</option>
                @endforeach
            @endif
        </select>
    </fieldset>
    <fieldset class="flex-1 d_flex">
        <label class="d_flex justify-center self-center" for="contact-cellphone">
            <img src="{{ asset('assets/site/images/label-5.png') }}" title="Celular" alt="Celular" />
        </label>
        <input class="flex-1 masked-phone" type="text" id="contact-cellphone" name="cell_phone" placeholder="Celular" />
    </fieldset>
    <fieldset class="flex-1 d_flex">
        <label class="d_flex justify-center self-center" for="contact-subject">
            <img src="{{ asset('assets/site/images/label-6.png') }}" title="Assunto" alt="Assunto" />
        </label>
        <input type="text" id="contact-subject" name="subject" placeholder="Assunto" />
    </fieldset>
    <fieldset class="flex-1 p-top-10 p-bottom-10 w-100 d_flex">
        <textarea class="flex-1" type="text" id="contact-message" name="message" placeholder="Mensagem... *" required></textarea>
    </fieldset>
    <fieldset class="flex-1 w-100 d_flex justify-end box-submit justify-1024-center">
        <input class="pointer smooth" type="submit" id="send-contact" value="Enviar" />
    </fieldset>
    <div class="def-msg w-100 m-top-30 f-size-16 t-align-c"></div>
{!! Form::close() !!}