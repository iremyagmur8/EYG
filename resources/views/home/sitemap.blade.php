@php echo '<?xml version="1.0" encoding="UTF-8"?>';
    use App\Http\Controllers\HomepageController
@endphp
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd"
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($cData->data as $key=>$val)
        <url>
            <loc>{{config()->get("solaris.site.url")}}{{str_slug($val->title,"-")}}/{{$val->id}}.html</loc>
            <lastmod>{{date("Y-m-d\TH:i:s+00:00",strtotime($val->updated_at))}}</lastmod>
            @isset($val->files[0]->file)
                <image:image>
                    <image:loc>{{config()->get("solaris.site.url")}}{{substr(HomepageController::webps($val->files[0]->file,"l"),1)}}</image:loc>
                    <image:title><![CDATA[{!! $val->title !!}]]></image:title>
                </image:image>
            @endisset

        </url>

    @endforeach
</urlset>
