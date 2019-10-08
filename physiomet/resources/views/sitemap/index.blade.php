<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ config('app.url') }}</loc>
        <lastmod>{{ date('Y-m-d') }}T00:00:00+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('home') }}</loc>
        <lastmod>{{ date('Y-m-d') }}T00:00:00+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('about') }}</loc>
        <lastmod>{{ date('Y-m-d') }}T00:00:00+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('segment') }}</loc>
        <lastmod>{{ date('Y-m-d') }}T00:00:00+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @if(!$segments->isEmpty())
        @foreach ($segments as $row)
            <url>
                <loc>{{ route('segment.show', ['category' => $row->category, 'seo_link' => $row->seo_link]) }}</loc>
                <lastmod>{{ date('Y-m-d', strtotime($row->created_at)) }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @endforeach
    @endif
    @if(!$categorySegments->isEmpty())
        @foreach ($categorySegments as $row)
            <url>
                <loc>{{ route('segment.category', $row->seo_link) }}</loc>
                <lastmod>{{ date('Y-m-d', strtotime($row->created_at)) }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @endforeach
    @endif
    <url>
        <loc>{{ route('machine') }}</loc>
        <lastmod>{{ date('Y-m-d') }}T00:00:00+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @if(!$machines->isEmpty())
        @foreach ($machines as $row)
            <url>
                <loc>{{ route('machine.show', ['category' => $row->category, 'seo_link' => $row->seo_link]) }}</loc>
                <lastmod>{{ date('Y-m-d', strtotime($row->created_at)) }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @endforeach
    @endif
    @if(!$categoryMachines->isEmpty())
        @foreach ($categoryMachines as $row)
            <url>
                <loc>{{ route('machine.category', $row->seo_link) }}</loc>
                <lastmod>{{ date('Y-m-d', strtotime($row->created_at)) }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @endforeach
    @endif
    <url>
        <loc>{{ route('part') }}</loc>
        <lastmod>{{ date('Y-m-d') }}T00:00:00+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @if(!$categoryParts->isEmpty())
        @foreach ($categoryParts as $row)
            <url>
                <loc>{{ route('part.category', $row->seo_link) }}</loc>
                <lastmod>{{ date('Y-m-d', strtotime($row->created_at)) }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @endforeach
    @endif
    <url>
        <loc>{{ route('construction') }}</loc>
        <lastmod>{{ date('Y-m-d') }}T00:00:00+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @if(!$constructions->isEmpty())
        @foreach ($constructions as $row)
            <url>
                <loc>{{ route('construction.show', $row->seo_link) }}</loc>
                <lastmod>{{ date('Y-m-d', strtotime($row->created_at)) }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @endforeach
    @endif
    @if(!$tags->isEmpty())
        @foreach ($tags as $row)
            <url>
                <loc>{{ route('blog.tag', ['seo_link' => $row->seo_link]) }}</loc>
                <lastmod>{{ date('Y-m-d') }}T00:00:00+00:00</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @endforeach
    @endif
    @if(!$posts->isEmpty())
        @foreach ($posts as $row)
            <url>
                <loc>{{ route('blog.show', ['seo_link' => $row->seo_link]) }}</loc>
                <lastmod>{{ $row->date }}T00:00:00+00:00</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @endforeach
    @endif
    <url>
        <loc>{{ route('budget') }}</loc>
        <lastmod>{{ date('Y-m-d') }}T00:00:00+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('contact') }}</loc>
        <lastmod>{{ date('Y-m-d') }}T00:00:00+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('work') }}</loc>
        <lastmod>{{ date('Y-m-d') }}T00:00:00+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('technical-assistance') }}</loc>
        <lastmod>{{ date('Y-m-d') }}T00:00:00+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('blog') }}</loc>
        <lastmod>{{ date('Y-m-d') }}T00:00:00+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
</urlset>