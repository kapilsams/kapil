<?php
  ini_set("display_errors",1);
  error_reporting(1);
  // make usre php curl is installed on your server
  /*
  * function will post data using curl on given url
  * $data = array
  * returns xml
  */
  function curl_request($data) {
//echo $data;die;
 $url = 'https://my.mailin.fr/'; //WS URL
//  $url = 'http://localhost/emailing_zend/branches/'; //WS URL
 // $url = 'http://localhost/mailin_zend_rc1/'; //WS URL
  //$url = 'http://newdev.mailin.fr/'; //WS URL
  
  $ch = curl_init();

  // prepate data for curl post
  $ndata='';
  if(is_array($data)){
    foreach($data AS $key=>$value){
      $ndata .=$key.'='.urlencode($value).'&';
    }
    }else
    {
    $ndata=$data;
    }

  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
  curl_setopt($ch, CURLOPT_POST      ,1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS,$ndata);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
  curl_setopt($ch, CURLOPT_URL, $url);
 // curl_setopt($ch, CURLOPT_VERBOSE, true);
  $data = curl_exec($ch);
  curl_close($ch);

  return $data;

 }


// get Message details by using message id
$data = array();


$data['key']='j0RrDU41';
$data['webaction']='ADDFOLDER';
$data['foldername']='123';

echo curl_request($data);

