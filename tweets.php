<?php
//header('Content-Type: application/atom+xml; charset=utf-8');

$parameters = array(
  'appid' => 'tCa4.fDV34GcXMnIbz5dWxSZWjSWsMXIQSqiVVBFb55nTKX1RFLqYyuM677Jz2vK',
  'context' => file_get_contents($_GET['identifier'])
);

$joined_parameters = array();
foreach ($parameters as $key => $value)
  $joined_parameters[] = urlencode($key) . '=' . urlencode($value);

$url_parameters = '?' . implode('&', $joined_parameters);

$keyword_request = curl_init();
curl_setopt($keyword_request, CURLOPT_URL, 'http://search.yahooapis.com/ContentAnalysisService/V1/termExtraction');
curl_setopt($keyword_request, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($keyword_request, CURLOPT_POST, 1);
curl_setopt($keyword_request, CURLOPT_POSTFIELDS, $url_parameters);
$result = curl_exec($keyword_request);
echo $result;
$keyword_xml = simplexml_load_string($result);
curl_close($keyword_request);

$keywords = array();

foreach ($keyword_xml->children() as $result)
  $keywords = array_merge($keywords, explode(' ', $result));

$keywords = array_unique($keywords);

readfile('http://search.twitter.com/search.atom?rpp=4&q=' . urlencode(implode(' ', $keywords)));
?>
