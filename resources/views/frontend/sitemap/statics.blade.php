<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($statics as $static)
        <url>
            <loc>https://www.annaperezroses.com/{{ $static }}</loc>
            <lastmod>{{ $startOfMonth }}</lastmod>
            <changefreq>yearly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>