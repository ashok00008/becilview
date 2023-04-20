<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
            <url>
                <loc>https://beciljobs.com/#/</loc>
                <lastmod>2020-12-11T11:25:53+00:00</lastmod>
                <priority>1.00</priority>
              </url>
              <url>
                <loc>https://beciljobs.com/#/active-vacancy</loc>
                <lastmod>2020-12-11T11:25:53+00:00</lastmod>
                <priority>1.00</priority>
              </url>
              <url>
                <loc>https://beciljobs.com/#/job-closingdate</loc>
                <lastmod>2020-12-11T11:25:53+00:00</lastmod>
                <priority>1.00</priority>
              </url>
              <url>
                <loc>https://beciljobs.com/#/job-notice</loc>
                <lastmod>2020-12-11T11:25:53+00:00</lastmod>
                <priority>1.00</priority>
              </url>
              <url>
                <loc>https://beciljobs.com/#/aboutus</loc>
                <lastmod>2020-12-11T11:25:53+00:00</lastmod>
                <priority>1.00</priority>
              </url>
              <url>
                <loc>https://beciljobs.com/#/privacy-policy</loc>
                <lastmod>2020-12-11T11:25:53+00:00</lastmod>
                <priority>1.00</priority>
              </url>
              <url>
                <loc>https://beciljobs.com/#/term-condition</loc>
                <lastmod>2020-12-11T11:25:53+00:00</lastmod>
                <priority>1.00</priority>
              </url>
            @foreach ($data as $url)
                <url>
                    <loc>{{ $url['link'] }}</loc>
                    <lastmod>{{ $url['created_at'] }}</lastmod>
                    <priority>1.00</priority>
                </url>
            @endforeach

</urlset>