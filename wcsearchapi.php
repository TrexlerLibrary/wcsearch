<?php

require_once('keys.inc');

$key = API_KEY;
$start = 0;
$count = 25;
//$format = "rss";
$cformat = "mla";

$query = "philosophy of education";

function pullXml($url) {
  $xml = file_get_contents($url);

  if (!$xml) {
    throw new Exception("Unable to get results!");
  } else {
    return $xml;
  }
}

//function worldcat_opensearch($key,$query,$format,$start,$count,$cformat) {
function worldcat_opensearch($key,$query,$start,$count,$cformat) {
	
	// construct worldcat opensearch request
	$url = "http://www.worldcat.org/webservices/catalog/search/worldcat/";
	$url .= "opensearch?q=";
	$url .= urlencode($query);
	//$url .= "&format=".$format;
	$url .= "&start=".$start;
	$url .= "&count=".$count;
	$url .= "&cformat=".$cformat;
	$url .= "&wskey=".$key;

  try {  
    return pullXml($url);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}



//worldcat_opensearch($key,$query,$format,$start,$count,$cformat);
$results = worldcat_opensearch($key,$query,$start,$count,$cformat);

print_r($results);

?>
