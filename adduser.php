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
//$url = 'http://ws.mailin.fr/'; //WS URL
//  $url = 'http://localhost/emailing_zend/branches/'; //WS URL
 $url = 'http://localhost/mailin_zend_dev/'; //WS URL
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
  $data = curl_exec($ch);
  curl_close($ch);

  return $data;

 }


// get Message details by using message id
$data = array();
//$data['key']='KAQgGX2H';
/*$data['key']='WVUq24QJ';
$data['email']='silverline_slit@rediffmail.com';
$data['blacklisted']='0';
$data['webaction']='USERCREADIT';
$data['attributes_name']='ORDER_ID|ORDER_PRICE|ORDER_DATE';
$data['attributes_value']='04|12.01|24-12-2012';
$data['listid']='198';*/

$data['key']='local';
$data['webaction']='USERCREADIT';
$data['email']=' elmahdi.khokha@dts5.com';
$data['blacklisted']='0';
$data['attributes_name']='ORDER_ID|ORDER_PRICE|ORDER_NAME|ORDER_DATE';
$data['attributes_value']='9|10,05|abc|26/12/2012';
$data['listid']='9|2';




echo curl_request($data);
$res = json_encode(curl_request($data));

