{!! Form::open(['route' => 'partner.store', 'class' => 'w-100 m-top-40 d_flex wrap form form-2 justify-space m-top-1024-20 column-600', 'id' => 'fPartner']) !!}
    <label class="w-100">
        Dados Básicos
    </label>
    <fieldset class="w-100 m-top-10">
        <input class="w-100" type="text" id="partner-rz" name="social_reason" maxlength="191" placeholder="Razão Social *" required />
    </fieldset>
    <fieldset class="w-100">
        <input class="w-100" type="text" id="partner-nf" name="fantasy_name" maxlength="191" placeholder="Nome Fantasia" />
    </fieldset>
    <fieldset>
        <input class="w-100 masked-cnpj" type="text" id="partner-cnpj" name="cnpj" maxlength="191" placeholder="CNPJ *" required />
    </fieldset>
    <fieldset>
        <input class="w-100" type="text" id="partner-ie" name="state_registration" placeholder="Inscrição Estadual *" required />
    </fieldset>
    <fieldset class="w-100">
        <input class="w-100" type="text" id="partner-address" name="address" maxlength="191" placeholder="Endereço *" required />
    </fieldset>
    <fieldset>
        <input class="w-100" type="text" id="partner-district" name="neighborhood" maxlength="191" placeholder="Bairro *" required />
    </fieldset>
    <fieldset>
        <input class="w-100" type="text" id="partner-city" name="city" placeholder="Cidade *" maxlength="191" required />
    </fieldset>
    <fieldset class="uf">
        <input class="w-100" type="text" id="partner-uf" name="state" maxlength="2" size="2" placeholder="UF *" required />
    </fieldset>
    <fieldset class="cep">
        <input class="w-100 masked-cep" type="text" id="partner-cep" name="zip_code" maxlength="191" placeholder="CEP *" required />
    </fieldset>
    <fieldset>
        <input class="w-100 masked-phone" type="text" id="partner-phone" name="phone" maxlength="191" placeholder="Telefone *" required />
    </fieldset>
    <fieldset>
        <input class="w-100 masked-phone" type="text" id="partner-fax" name="fax" maxlength="191" placeholder="Fax" />
    </fieldset>
    <fieldset>
        <input class="w-100" type="email" id="partner-email" name="email" maxlength="191" placeholder="E-mail *" required />
    </fieldset>
    <label class="w-100 m-top-50 m-top-1024-30">
        Dados Avançados
    </label>
    <fieldset class="w-100 m-top-10">
        <input class="w-100" type="text" id="partner-qtd" name="amount_employees" maxlength="191" placeholder="Quantidade de Funcionários" />
    </fieldset>
    <fieldset class="w-100">
        <input class="w-100" type="text" id="partner-int" name="acting_region" maxlength="191" placeholder="Regiões de interesse para atuação" />
    </fieldset>
    <fieldset class="w-100">
        <input class="w-100" type="text" id="partner-cc" name="how_did_it_arrive" maxlength="191" placeholder="Como chegou à Wesa?" />
    </fieldset>

    <label class="w-100 m-top-50 m-top-1024-30">
        Contatos
    </label>
    <fieldset class="w-100 type-2">
        <input class="w-100" type="text" id="partner-contact-1" name="contact[1][name]" maxlength="191" placeholder="Contato 1" />
    </fieldset>
    <fieldset class="w-100 type-2">
        <input class="w-100" type="text" id="partner-contact-1-c" name="contact[1][office]" maxlength="191" placeholder="Cargo" />
    </fieldset>
    <fieldset class="w-100 type-2">
        <input class="w-100 masked-phone" type="text" id="partner-contact-1-t" maxlength="191" name="contact[1][phone]" placeholder="Telefone" />
    </fieldset>
    <fieldset class="w-100 type-2">
        <input class="w-100" type="text" id="partner-contact-2" name="contact[2][name]" maxlength="191" placeholder="Contato 2" />
    </fieldset>
    <fieldset class="w-100 type-2">
        <input class="w-100" type="text" id="partner-contact-2-c" name="contact[2][office]" maxlength="191" placeholder="Cargo" />
    </fieldset>
    <fieldset class="w-100 type-2">
        <input class="w-100 masked-phone" type="text" id="partner-contact-2-t" name="contact[2][phone]" maxlength="191" placeholder="Telefone" />
    </fieldset>
    <fieldset class="w-100 type-2">
        <input class="w-100" type="text" id="partner-contact-3" name="contact[3][phone]" maxlength="191" placeholder="Contato 3" />
    </fieldset>
    <fieldset class="w-100 type-2">
        <input class="w-100" type="text" id="partner-contact-3-c" name="contact[3][office]" maxlength="191" placeholder="Cargo" />
    </fieldset>
    <fieldset class="w-100 type-2">
        <input class="w-100 masked-phone" type="text" id="partner-contact-3-t" name="contact[3][phone]" maxlength="191" placeholder="Telefone" />
    </fieldset>

    <label class="w-100 m-top-50 m-top-1024-30">
        Produtos que Comercializa
    </label>
    <span class="w-100 m-top-7 f-w-800 t-align-c color-grey f-size-14">
        (Hardware, Software, Outros)
    </span>
    <article class="w-100 d_flex direction-column box-repeat-product" data-cont="1">
        <div class="w-100 main-repeat">
            <div class="w-100 d_flex wrap justify-space repeat relative">
                <fieldset>
                    <input class="w-100" type="text" id="partner-prod-1" value="" name="product[1][product]" maxlength="191" placeholder="Produto" />
                </fieldset>
                <fieldset>
                    <input class="w-100" type="text" id="partner-fab-1" value="" name="product[1][manufacturer]" maxlength="191" placeholder="Fabricante" />
                </fieldset>
                <fieldset>
                    <input class="w-100" type="text" id="partner-desc-1" value="" name="product[1][description]" maxlength="191" placeholder="Descrição" />
                </fieldset>
                <fieldset class="display-none">
                    <a class="w-100" href="javascript:void(0)" id="partner-remove" onclick="removeBlock($(this))">Remover</a>
                </fieldset>
            </div>
        </div>
    </article>
    <div class="w-100 m-top-50 m-top-1024-30">
        <a class="display-inline-block main-bg smooth see-more w-600-100" href="javascript:void(0);" onclick="addBlock($('.box-repeat-product'));" title="Adicionar Produto">
            Adicionar Produto
        </a>
    </div>

    <label class="w-100 m-top-50 m-top-1024-30">
        Principais Clientes
    </label>
    <article class="w-100 d_flex direction-column box-repeat-client" data-cont="1">
        <div class="w-100 main-repeat">
            <div class="w-100 d_flex wrap justify-space repeat relative">
                <fieldset>
                    <input class="w-100" type="text" id="partner-client-1-rz" value="" name="client[1][social_reason]" placeholder="Razão Social" maxlength="191" />
                </fieldset>
                <fieldset>
                    <input class="w-100 masked-cnpj" type="text" id="partner-client-1-cnpj" value="" name="client[1][cnpj]" placeholder="CNPJ" maxlength="191" />
                </fieldset>
                <fieldset>
                    <input class="w-100 masked-phone" type="text" id="partner-client-1-phone" value="" name="client[1][phone]" placeholder="Telefone" maxlength="191" />
                </fieldset>
                <fieldset>
                    <input class="w-100" type="text" id="partner-client-1-uf" value="" name="client[1][state]" placeholder="UF" maxlength="2" size="2" />
                </fieldset>
                <fieldset>
                    <input class="w-100" type="text" id="partner-client-1-city" value="" name="client[1][city]" placeholder="Cidade" maxlength="191" />
                </fieldset>
                <fieldset class="display-none">
                    <a class="w-100" href="javascript:void(0)" id="partner-remove" onclick="removeBlock($(this))">Remover</a>
                </fieldset>
            </div>
        </div>
    </article>
    <div class="w-100 m-top-50 m-top-1024-30">
        <a class="display-inline-block main-bg smooth see-more w-600-100" href="javascript:void(0);" onclick="addBlock($('.box-repeat-client'));" title="Adicionar">
            Adicionar
        </a>
    </div>

    <label class="w-100 m-top-50 m-top-1024-30">
        Principais Fornecedores
    </label>
    <article class="w-100 d_flex direction-column box-repeat-providers" data-cont="1">
        <div class="w-100 main-repeat">
            <div class="w-100 d_flex wrap justify-space repeat relative">
                <fieldset>
                    <input class="w-100" type="text" id="partner-providers-1-rz" value="" name="provider[1][social_reason]" placeholder="Razão Social" maxlength="191" />
                </fieldset>
                <fieldset>
                    <input class="w-100 masked-cnpj" type="text" id="partner-providers-1-cnpj" value="" name="provider[1][cnpj]" placeholder="CNPJ" maxlength="191" />
                </fieldset>
                <fieldset>
                    <input class="w-100 masked-phone" type="text" id="partner-providers-1-phone" value="" name="provider[1][phone]" placeholder="Telefone" maxlength="191" />
                </fieldset>
                <fieldset>
                    <input class="w-100" type="text" id="partner-providers-1-uf" value="" name="provider[1][state]" placeholder="UF" maxlength="2" size="2" />
                </fieldset>
                <fieldset>
                    <input class="w-100" type="text" id="partner-providers-1-city" value="" name="provider[1][city]" placeholder="Cidade" maxlength="191" />
                </fieldset>
                <fieldset class="display-none">
                    <a class="w-100" href="javascript:void(0)" id="partner-remove" onclick="removeBlock($(this))">Remover</a>
                </fieldset>
            </div>
        </div>
    </article>
    <div class="w-100 m-top-50 m-top-1024-30">
        <a class="display-inline-block main-bg smooth see-more w-600-100" href="javascript:void(0);" onclick="addBlock($('.box-repeat-providers'));" title="Adicionar">
            Adicionar
        </a>
    </div>

    <fieldset class="w-100 m-top-50 m-top-1024-30">
        <input class="display-inline-block pointer see-more see-more-2 smooth w-600-100" type="submit" id="send-partner" value="Enviar" />
    </fieldset>
    <div class="def-msg w-100 m-top-30 f-size-16 t-align-c"></div>
{!! Form::close() !!}