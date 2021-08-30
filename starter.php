<?php
// $data_received = $request->get_params();

try {


    //----------- get data ----------------

    $url = "https://ap-southeast-2.api.vaultre.com.au/api/v1.3/properties/$property_id";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "accept: application/json",
        "X-Api-Key: SjIIGwEvT670EWxsSX20Q7Uuyyq5KzrO47plDYCU",
        "Authorization: Bearer wbtfnnqvazkmrcfqhkkzitbtgctlbqqjdqzduzps",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $response = json_decode(curl_exec($curl));
    curl_close($curl);


    //----------- parse data --------------

    $property_data = [
        "post-title-0" => $response->displayAddress,
        "property_price" => $response->saleHistory[0]->salePrice,
        "property_size" => $response->landArea->value,
        "size_postfix" => $response->landArea->units,
        "property_id" => $property_id,
        "year_built" => $response->yearBuilt ?: "",
        "property_type" => $response->type->propertyClass->name, // rural
        "property_status" => $response->commercialListingType,   // for sale
    ];

    //print_r($property_data);

    // $property_data["photos"] = [];
    // foreach ($response->photos as $photo) {
    //     array_push($property_data["photos"], $photo->url);
    // }


    //------------ post data ------------

    $url = "http://localhost:8000/receiver.php";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    // curl_setopt($curl, CURLOPT_POST, true);
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // $headers = array(
    //     "Content-Type: application/json",
    // );
    // curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    // curl_setopt($curl, CURLOPT_POSTFIELDS, $property_data);

    curl_setopt($curl, CURLOPT_TIMEOUT, 20);
    $resp = curl_exec($curl);
    curl_close($curl);

    print_r($resp);
} catch (Exception $e) {
    return $e->getMessage();
}


// $time = date("F jS Y, H:i", time() + 25200);
// $file = dirname(__FILE__) . "/responses/post_data.txt_$time";
// $open = fopen($file, "a");
// $write = fputs($open, json_encode($property_data));
// fclose($open);


// return json_encode($property_data, 200);
