<?php

$url = $_POST["URL"];
$show = $_POST["SHOW"];
//dont think we need this next part
/*
stream_context_set_default(
    array(
        'http' => array(
            'method' => 'HEAD',
            'header' => "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_4) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.79 Safari/537.1\r\n"
        )
    )
);
*/

function downloadURL($url) {
 if(!function_exists('curl_init')) {
 die ("Curl PHP package not installedn");
 }

 /*Initializing CURL*/
 $curlHandle = curl_init();

 /*The URL to be downloaded is set*/
 curl_setopt($curlHandle, CURLOPT_URL, $url);
 /*Return the HTTP headers*/
 curl_setopt($curlHandle, CURLOPT_HEADER, true);
 
 curl_setopt($curlHandle, CURLOPT_NOBODY, true);
 
 curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
 
 curl_setopt($curlHandle,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

 /*Now execute the CURL, download the URL specified*/
 $response = curl_exec($curlHandle);
 return $response;
}

$res = downloadURL($url);
//COULD HAVE OPTIONS FOR CURL OR get_headers
//$res = get_headers($url);

//echo "<a href='".$url."'>".$url."</a><br>";
//print_r($res[0]);
if(preg_match("/200 ok/i", $res)>0 && $show == "200"){//was 200
  echo "<div class='block'>";
  echo "<br><a href='".$url."' target='_blank'>".$url."</a><br>";
  echo "<span style='color:#ffd800;'>";
  echo($res);
  echo "</span>";
  //echo "<h1 style='color:red'>HIT</h1>";
  echo "<div class='sep'>------------------------</div>";
  echo "</div>";
}
if(preg_match("/404/", $res)<1 && $show == "NOT404"){//not 404
  echo "<div class='block'>";
  echo "<br><a href='".$url."' target='_blank'>".$url."</a><br>";
  echo "<span style='color:#ffd800;'>";
  echo($res);
  echo "</span>";
  //echo "<h1 style='color:red'>HIT</h1>";
  echo "<div class='sep'>------------------------</div>";
  echo "</div>";
}
if($show == "ALL"){
  echo "<div class='block'>";
  echo "<br><a href='".$url."' target='_blank'>".$url."</a><br>";
  echo($res);
  echo "<div class='sep'>------------------------</div>";
  echo "</div>";
}
else{
  echo "<span class='loading'>&#1422;</span>";
}