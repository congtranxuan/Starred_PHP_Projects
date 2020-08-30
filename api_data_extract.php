<?php
    $url = "https://api.github.com/search/repositories?q=PHP+language:PHP&sort=stars&order=desc";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
       'User-Agent: congtranxuan'
     ]);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


    $result = curl_exec($ch);

    if(curl_error($ch)) {
        echo curl_error($ch);
    }

    curl_close($ch);

    $result_decode  = json_decode($result, true);

?>
