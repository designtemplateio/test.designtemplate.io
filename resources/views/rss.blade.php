<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title><![CDATA[ designtemplate.io ]]></title>
        <link><![CDATA[ https://designtemplate.io/rss/illustration ]]></link>
        <description><![CDATA[ Your website description ]]></description>
        <language>en</language>
        <pubDate>{{ now() }}</pubDate>
  
        @foreach($items as $post)
            <item>
                <title><![CDATA[{{ $post->item_name }}]]></title>
                <link>https://designtemplate.io/item/{{ $post->item_slug }}</link>
                <description><![CDATA[{!! $post->item_shortdesc !!}]]></description>
                <guid>{{ $post->item_id }}</guid>
                
            </item>
        @endforeach
    </channel>
</rss>