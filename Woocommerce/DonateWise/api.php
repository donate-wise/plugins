<?php

function donatewise_send_request(){
	$key = get_option('donatewise_uuid');
	$url = 'https://api.donate-wise.org/v1/merchant/status?key='.$key;

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$headers = array(
	   "Accept: */*",
	);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	//for debug only!
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$resp = curl_exec($curl);

	$data = json_decode($resp);

	if(isset($data->status) && $data->status == 'active'){
		$array = array(
		"status" => $data->status,
		"merchantName" => $data->merchantName,
	    "donationPercentage" => $data->donationPercentage,
	    "donateName" => $data->donatees[0]->name,
	    "donateLogo" => $data->donatees[0]->logoUrl,
		);
	    

		update_option('donatewise_widget_product', $array);
	}else
	{
		update_option('donatewise_widget_product', 'error');
	}
	
	if(isset($data->status))
		$result = $data->status;
	else
		$result = 'error';
	
	return $result;
}

?>