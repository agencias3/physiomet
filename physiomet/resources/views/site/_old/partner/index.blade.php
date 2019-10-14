@extends('site.layouts.app')
@section('content')
    @inject("page", "\AgenciaS3\Http\Controllers\Site\PageController")
    <?php $page->show(8); ?>
    <section class="w-100 p-top-50 p-bottom-50 p-top-1024-30 p-bottom-1024-30">
        <div class="center">
            <div class="w-100 t-align-c">
                <div class="display-inline-block w-900-px f-none w-1024-100">
                    <h1 class="w-100 t-align-c color-grey f-size-40 f-w-800 f-size-1024-26 f-size-600-20">
                        {!! session()->get('page')[8]['name'] !!}
                    </h1>
                    <div class="w-100 m-top-30 text m-top-1024-20">
                        {!! session()->get('page')[8]['description'] !!}
                    </div>
                    @include('site.partner._form')
                    <hr />
                    <!--
                    <form class="w-100 m-top-40 d_flex wrap form form-2 justify-space m-top-1024-20 column-600" id="fContact" method="post" action="">
                        <label class="w-100 m-top-50 m-top-1024-30">
                            Dados Avançados
                        </label>
                        <fieldset class="w-100 type-2">
                            <input class="w-100" type="text" id="partner-contact-1" value="" placeholder="Contato 1" />
                        </fieldset>
                        <fieldset class="w-100 type-2">
                            <input class="w-100" type="text" id="partner-contact-1-c" value="" placeholder="Cargo" />
                        </fieldset>
                        <fieldset class="w-100 type-2">
                            <input class="w-100 masked-phone" type="text" id="partner-contact-1-t" value="" placeholder="Telefone" />
                        </fieldset>
                        <fieldset class="w-100 type-2">
                            <input class="w-100" type="text" id="partner-contact-2" value="" placeholder="Contato 2" />
                        </fieldset>
                        <fieldset class="w-100 type-2">
                            <input class="w-100" type="text" id="partner-contact-2-c" value="" placeholder="Cargo" />
                        </fieldset>
                        <fieldset class="w-100 type-2">
                            <input class="w-100 masked-phone" type="text" id="partner-contact-2-t" value="" placeholder="Telefone" />
                        </fieldset>
                        <fieldset class="w-100 type-2">
                            <input class="w-100" type="text" id="partner-contact-3" value="" placeholder="Contato 3" />
                        </fieldset>
                        <fieldset class="w-100 type-2">
                            <input class="w-100" type="text" id="partner-contact-3-c" value="" placeholder="Cargo" />
                        </fieldset>
                        <fieldset class="w-100 type-2">
                            <input class="w-100 masked-phone" type="text" id="partner-contact-3-t" value="" placeholder="Telefone" />
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
                                        <input class="w-100" type="text" id="partner-prod-1" value="" name="partners[1][product]" placeholder="Produto" />
                                    </fieldset>
                                    <fieldset>
                                        <input class="w-100" type="text" id="partner-fab-1" value="" name="partners[1][fab]" placeholder="Fabricante" />
                                    </fieldset>
                                    <fieldset>
                                        <input class="w-100" type="text" id="partner-desc-1" value="" name="partners[1][desc]" placeholder="Descrição" />
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
                                        <input class="w-100" type="text" id="partner-client-1-rz" value="" name="client[1][rz]" placeholder="Razão Social" />
                                    </fieldset>
                                    <fieldset>
                                        <input class="w-100" type="text" id="partner-client-1-cnpj" value="" name="client[1][cnpj]" placeholder="CNPJ" />
                                    </fieldset>
                                    <fieldset>
                                        <input class="w-100 masked-phone" type="text" id="partner-client-1-phone" value="" name="client[1][phone]" placeholder="Telefone" />
                                    </fieldset>
                                    <fieldset>
                                        <input class="w-100" type="text" id="partner-client-1-uf" value="" name="client[1][uf]" placeholder="UF" />
                                    </fieldset>
                                    <fieldset>
                                        <input class="w-100" type="text" id="partner-client-1-city" value="" name="client[1][city]" placeholder="Cidade" />
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
                                        <input class="w-100" type="text" id="partner-providers-1-rz" value="" name="providers[1][rz]" placeholder="Razão Social" />
                                    </fieldset>
                                    <fieldset>
                                        <input class="w-100" type="text" id="partner-providers-1-cnpj" value="" name="providers[1][cnpj]" placeholder="CNPJ" />
                                    </fieldset>
                                    <fieldset>
                                        <input class="w-100 masked-phone" type="text" id="partner-providers-1-phone" value="" name="providers[1][phone]" placeholder="Telefone" />
                                    </fieldset>
                                    <fieldset>
                                        <input class="w-100" type="text" id="partner-providers-1-uf" value="" name="providers[1][uf]" placeholder="UF" />
                                    </fieldset>
                                    <fieldset>
                                        <input class="w-100" type="text" id="partner-providers-1-city" value="" name="providers[1][city]" placeholder="Cidade" />
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
                    </form>
                    -->
                </div>
            </div>
        </div>
    </section>
@endsection