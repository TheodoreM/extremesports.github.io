<?php


##################################################
# SAMPLE PHP CODE TO SEND SMS VIA SERVAGE API
##################################################

// Send SMS function
function sendSMS($number,$message,$concat = 1) {
	$url = 'http://smsgateway.servage.net/sms.php';
	$customer = 'YOURCUSTOMERID';
	$key = 'YOURKEY';
	$request = $url.'?customer='.$customer.'&key='.$key.'&number='.urlencode($number).'&message='.urlencode($message).'&concat='.$concat;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $request);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	curl_close($ch);
	return split(',',$response);
}

// Integration in your project
//$sms_api_result = sendSMS('number','text','1');

// Check if SMS was received by the API or not
//if ($sms_api_result[0] == 'OK') {
	// Ok, SMS received by the API
	// Do something here...
//}
//else {
	// Failure, SMS was not received by the API
	// I this example we display the response to identify the error
//	print_r($sms_api_result);
//}


##################################################
# SAMPLE PHP CODE FOR SMS COVERAGE QUERY
##################################################

// Coverage Query function
function coverageQuery($number) {
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, 'http://smsgateway.servage.net/sms_coverage.php?number='.$number); 
	curl_setopt($ch, CURLOPT_HEADER, 0); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$data = curl_exec($ch); 
	curl_close($ch);
	if (substr($data,0,2) == 'OK') return true;
	else return false;
}


?>
