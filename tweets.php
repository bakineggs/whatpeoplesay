<?php
header('Content-Type: application/atom+xml; charset=utf-8');

$parameters = array(
  'appid' => 'tCa4.fDV34GcXMnIbz5dWxSZWjSWsMXIQSqiVVBFb55nTKX1RFLqYyuM677Jz2vK',
  'context' => $_GET['description']
);

$joined_parameters = array();
foreach ($parameters as $key => $value)
  $joined_parameters[] = urlencode($key) . '=' . urlencode($value);

$url_parameters = '?' . implode('&', $joined_parameters);

$keyword_xml = simplexml_load_file('http://search.yahooapis.com/ContentAnalysisService/V1/termExtraction' . $url_parameters);

$keywords = array();

foreach ($keyword_xml->children() as $result)
  $keywords = array_merge($keywords, explode(' ', $result));

$keywords = array_unique($keywords);

readfile('http://search.twitter.com/search.atom?rpp=4&q=' . urlencode(implode(' ', $keywords)));
?>
