<?php

/**
 * List of Url's for checking
 */
$string = "
http://test.com/test1,
http://test.com/test2,
http://test.com/test3,
";


$urlsCheck = explode(',', $string);
$noUrl = array();
$existUrl = array();

foreach ($urlsCheck as $u) {
    sleep(1);
    $mylink = trim($u);
    $handler = curl_init($mylink);
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, TRUE);
    $re = curl_exec($handler);
    $httpcdd = curl_getinfo($handler, CURLINFO_HTTP_CODE);

    if ($httpcdd == '404') {
        if(isset($noUrl[$mylink])) {
            continue;
        }
        echo 'it is 404';
        echo '<br>';
        echo $mylink;
        $noUrl[$mylink] = $mylink;
    } else {
        echo 'it is not 404';
        echo '<br>';
        echo $mylink;
    }
    echo '<hr>';
}


echo '<hr><br><br><br><br><br>';

foreach($noUrl as $n) {
    echo $n.',<br>';
}
