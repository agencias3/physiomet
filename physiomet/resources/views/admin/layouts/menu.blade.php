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
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'team')class="active"@endif>
                                <a href="{{ route('admin.team.index') }}">
                                    Equipe
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li @if(isset($config['activeMenu']) && $config['activeMenu'] == 'covenant')class="nav-expanded nav-active"@endif>
                        <a href="{{ route('admin.covenant.index') }}">
                            <i class="fa fa-file-image-o" aria-hidden="true"></i>
                            <span>Convênios</span>
                        </a>
                    </li>
                    <li @if(isset($config['activeMenu']) && $config['activeMenu'] == 'service')class="nav-expanded nav-active"@endif>
                        <a href="{{ route('admin.service.index') }}">
                            <i class="fa fa-list-ul" aria-hidden="true"></i>
                            <span>Serviços</span>
                        </a>
                    </li>
                    <li @if(isset($config['activeMenu']) && $config['activeMenu'] == 'type')class="nav-expanded nav-active"@endif>
                        <a href="{{ route('admin.type.index') }}">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Tipo de Fisio</span>
                        </a>
                    </li>
                    <li class="nav-parent @if(isset($config['activeMenu']) && $config['activeMenu'] == 'blog') nav-expanded nav-active @endif">
                        <a>
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <span>Blog</span>
                        </a>
                        <ul class="nav nav-children">
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'post')class="active"@endif>
                                <a href="{{ route('admin.blog.post.index') }}">
                                    Post
                                </a>
                            </li>
                            <li @if(isset($config['activeMenuN2']) && $config['activeMenuN2'] == 'page-2')class="active"@endif>
                                <a href="{{ route('admin.configuration.page.edit', 2) }}">
                                    Descrição
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


