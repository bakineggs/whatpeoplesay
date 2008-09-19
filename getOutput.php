<?php
public static function getOutput() {
  $ret = array();
  define("SMDEFAULT", "");

  /* If you leave these blank, the default title and summary will be shown */
  $ret['title'] = SMDEFAULT;
  $ret['summary'] = SMDEFAULT;

  /* Now you fill in the rest. Use Data::get and Data::xpath to get data  */

  // Image
  $ret['image']['src'] = SMDEFAULT;
  $ret['image']['alt'] = SMDEFAULT;
  $ret['image']['title'] = SMDEFAULT;
  $ret['image']['allowResize'] = true;

  // Deep links - up to 4
  $ret['links'][0]['text'] = SMDEFAULT;
  $ret['links'][0]['href'] = SMDEFAULT;
  $ret['links'][1]['text'] = SMDEFAULT;
  $ret['links'][1]['href'] = SMDEFAULT;
  $ret['links'][2]['text'] = SMDEFAULT;
  $ret['links'][2]['href'] = SMDEFAULT;

  for ($i = 0; $i < 4; $i++) {
    $append = $i > 0 ? '.' . $i : '';
    if (($creator = Data::get('smid:HoW/dc:creator' . $append)) && $description = Data::get('smid:HoW/dc:description' . $append))
      $ret['dict'][$i] = array('key' => $creator, 'value' => $description);
  }

  /* This is for infobar apps
     You can put a subset of HTML in here
     See the docs for more details */
  $ret['infobar']['summary'] = SMDEFAULT;
  $ret['infobar']['blob'] = SMDEFAULT;

  return $ret;
}
?>