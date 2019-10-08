<aside id="sidebar-left" class="sidebar-left">
    <div class="sidebar-header">
        <div class="sidebar-title">
            Menu
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Menu"></i>
        </div>
    </div>
    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li @if(isset($config['activeMenu']) && $config['activeMenu'] == 'home')class="nav-expanded nav-active"@endif>
                        <a href="{{ route('admin.home.index') }}">
                            <i class="glyphicon glyphicon-th" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-parent @if(isset($config['activeMenu']) && $config['activeMenu'] == 'banner') nav-expanded nav-active @endif">
                        <a>
                            <i class="fa fa-image" aria-hidden="true"></i>
                            <span>Banner</span>
                        </a>
                        <ul class="nav nav-children">
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'desktop')class="active"@endif>
                                <a href="{{ route('admin.banner.desktop.index') }}">
                                    Desktop
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'mobile')class="active"@endif>
                                <a href="{{ route('admin.banner.mobile.index') }}">
                                    Mobile
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent @if(isset($config['activeMenu']) && $config['activeMenu'] == 'about') nav-expanded nav-active @endif">
                        <a>
                            <i class="fa fa-institution" aria-hidden="true"></i>
                            <span>Quem Somos</span>
                        </a>
                        <ul class="nav nav-children">
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'page-1')class="active"@endif>
                                <a href="{{ route('admin.configuration.page.edit', 1) }}">
                                    Quem Somos
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'page-3')class="active"@endif>
                                <a href="{{ route('admin.configuration.page.edit', 3) }}">
                                    Missão
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'page-4')class="active"@endif>
                                <a href="{{ route('admin.configuration.page.edit', 4) }}">
                                    Visão
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'page-5')class="active"@endif>
                                <a href="{{ route('admin.configuration.page.edit', 5) }}">
                                    Valores
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent @if(isset($config['activeMenu']) && $config['activeMenu'] == 'tip') nav-expanded nav-active @endif">
                        <a>
                            <i class="fa fa-question" aria-hidden="true"></i>
                            <span>Você sabia?</span>
                        </a>
                        <ul class="nav nav-children">
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'tip')class="active"@endif>
                                <a href="{{ route('admin.tip.index') }}">
                                    Você sabia?
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'page-7')class="active"@endif>
                                <a href="{{ route('admin.configuration.page.edit', 7) }}">
                                    Descrição
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li @if(isset($config['activeMenu']) && $config['activeMenu'] == 'client')class="nav-expanded nav-active"@endif>
                        <a href="{{ route('admin.client.index') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Clientes</span>
                        </a>
                    </li>
                    <li class="nav-parent @if(isset($config['activeMenu']) && $config['activeMenu'] == 'segment') nav-expanded nav-active @endif">
                        <a>
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Segmentos</span>
                        </a>
                        <ul class="nav nav-children">
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'segment')class="active"@endif>
                                <a href="{{ route('admin.segment.index') }}">
                                    Segmentos
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'page-2')class="active"@endif>
                                <a href="{{ route('admin.configuration.page.edit', 2) }}">
                                    Descrição
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent @if(isset($config['activeMenu']) && $config['activeMenu'] == 'product') nav-expanded nav-active @endif">
                        <a>
                            <i class="fa fa-mobile-phone" aria-hidden="true"></i>
                            <span>Produtos</span>
                        </a>
                        <ul class="nav nav-children">
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'category')class="active"@endif>
                                <a href="{{ route('admin.category.index') }}">
                                    Produto
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'product')class="active"@endif>
                                <a href="{{ route('admin.product.index') }}">
                                    Módulos
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent @if(isset($config['activeMenu']) && $config['activeMenu'] == 'blog') nav-expanded nav-active @endif">
                        <a>
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <span>Blog</span>
                        </a>
                        <ul class="nav nav-children">
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'post')class="active"@endif>
                                <a href="{{ route('admin.blog.post.index') }}">
                                    Blog
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'tag')class="active"@endif>
                                <a href="{{ route('admin.blog.tag.index') }}">
                                    Tag
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent @if(isset($config['activeMenu']) && $config['activeMenu'] == 'form') nav-expanded nav-active @endif">
                        <a>
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <span>Formulários</span>
                        </a>
                        <ul class="nav nav-children">
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'work')class="active"@endif>
                                <a href="{{ route('admin.work.index') }}">
                                    Trabalhe Conosco
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'newsletter')class="active"@endif>
                                <a href="{{ route('admin.newsletter.index') }}">
                                    Newsletter
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'contact')class="active"@endif>
                                <a href="{{ route('admin.contact.index') }}">
                                    Contatos
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'page-7')class="active"@endif>
                                <a href="{{ route('admin.configuration.page.edit', 7) }}">
                                    Descrição Contato
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'partner')class="active"@endif>
                                <a href="{{ route('admin.partner.index') }}">
                                    Parceiros
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'page-6')class="active"@endif>
                                <a href="{{ route('admin.configuration.page.edit', 6) }}">
                                    Descrição Parceiros
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent @if(isset($config['activeMenu']) && $config['activeMenu'] == 'configuration') nav-expanded nav-active @endif">
                        <a>
                            <i class="fa fa-gears" aria-hidden="true"></i>
                            <span>Configurações</span>
                        </a>
                        <ul class="nav nav-children">
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'keyword')class="active"@endif>
                                <a href="{{ route('admin.configuration.keyword.index') }}">
                                    Keywords
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'page')class="active"@endif>
                                <a href="{{ route('admin.configuration.page.index') }}">
                                    Páginas e Textos
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'seo-page')class="active"@endif>
                                <a href="{{ route('admin.configuration.seo-page.index') }}">
                                    SEO Páginas
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'form')class="active"@endif>
                                <a href="{{ route('admin.configuration.form.index') }}">
                                    Formulários
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'configuration')class="active"@endif>
                                <a href="{{ route('admin.configuration.configuration.index') }}">
                                    Configurações
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'newsletter')class="active"@endif>
                                <a href="{{ route('admin.configuration.user.index') }}">
                                    Usuários
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>


