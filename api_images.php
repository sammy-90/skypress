<?php

$api_search = str_replace(' ', "%20", $keyword);
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://bing-image-search1.p.rapidapi.com/images/search?q=".$api_search."",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
        //CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: bing-image-search1.p.rapidapi.com",
		"x-rapidapi-key: 5cbb9ac1b5msh81a594f66c3a8f7p1724b7jsn7e3629c7a99e"
	),
));

$response = curl_exec($curl); //echo $response;
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {

  //Prase And Create Meta Tags
  $jarray = json_decode($response, true);

  foreach($jarray['relatedSearches'] as $value) {$match++;
    echo "<div class='lists'><img src='".$value['thumbnail']['thumbnailUrl']."' border='0'/><br><big><font color='darkblue'>".$value['text']."</font></big></div>";     
    echo "<br><br>\n";
  }

}

?>