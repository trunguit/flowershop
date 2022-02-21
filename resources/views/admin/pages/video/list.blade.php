<?php

    parse_str(parse_url($link,PHP_URL_QUERY), $list) ;
    $api_key = 'AIzaSyAyqc3D8pAtgBBPsnneddcd75xDcCWru-w';
    $playlist_id =  isset($list["list"]) ?  $list["list"] : $list["v"]; 
    $api_url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId='.$playlist_id.'&key='. $api_key;
    $playlist = json_decode(file_get_contents($api_url));
?>
    <ul>
        @foreach($playlist->items as $item)
                <iframe width="49%" height="300px" src="https://www.youtube.com/embed/<?php echo $item->snippet->resourceId->videoId ;?>" frameborder="0" allowfullscreen=""></iframe>
        @endforeach   
    </ul>
