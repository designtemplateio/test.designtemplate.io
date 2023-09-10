<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title><![CDATA[ ItSolutionStuff.com ]]></title>
        <link><![CDATA[ https://your-website.com/feed ]]></link>
        <description><![CDATA[ Your website description ]]></description>
        <language>en</language>
        <pubDate>{{ now() }}</pubDate>
  
        @foreach($items as $post)
            <item>
                <title><![CDATA[{{ $post->item_name }}]]></title>
                <link>{{ $post->item_slug }}</link>
                <description><![CDATA[{!! $post->item_shortdesc !!}]]></description>
                <author><![CDATA[Hardk Savani]]></author>
                <guid>{{ $post->item_id }}</guid>
                <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>