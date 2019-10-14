<?php $ativo = Route::getCurrentRoute()->uri(); ?>
<nav class="w-100 bread-crumbs">
    <ul class="w-100 c-left d_flex wrap justify-center">
        <li>
            <a href="{{ route('home') }}" title="Home">
                Home
            </a>
        </li>
        <li>
            >
        </li>
        @if($ativo == 'blog' || $ativo == 'blog/tag/{tag}' || $ativo == 'blog/{seo_link}')
        <li>
            <a @if($ativo == 'blog' ) class="active" @endif href="{{ route('blog') }}" title="Blog">
                Blog
            </a>
        </li>
            @if($ativo == 'blog/tag/{tag}')
            <li>
                >
            </li>
            <li>
                <a href="{{ route('blog.tag', $tag->seo_link) }}" title="Tag">
                    Tag
                </a>
            </li>
            <li>
                >
            </li>
            <li>
                <a class="active" href="{{ route('blog.tag', $tag->seo_link) }}" title="{{ $tag->name }}">
                    {{ $tag->name }}
                </a>
            </li>
            @endif
            @if($ativo == 'blog/{seo_link}')
                <li>
                    >
                </li>
                <li>
                    <a class="active" href="{{ route('blog.show', $post->seo_link) }}" title="{{ $post->name }}">
                        {{ $post->name }}
                    </a>
                </li>
            @endif
        @endif
        @if($ativo == 'contato')
            <li>
                <a class="active" href="{{ route('contact') }}" title="Contato">
                    Contato
                </a>
            </li>
        @endif
    </ul>
</nav>