<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// receive data
$property_data = $_POST;

//print_r($property_data);

// $property_data = [
//     "post-title-0" => "post title",
//     "property_price" => "1000",
//     "property_size" => "1200",
//     "size_postfix" => "sq ft",
//     "property_id" => "1234",
//     "year_built" => "2000",
//     "photos"=> [
//        "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/mydimport-1608453779-hires.3850-GB002-1.jpg",
//        "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/mydimport-1608453927-hires.990-01.jpg",
//    ]
// ];

try {
    if (count($property_data) > 0) {
        //  --- run script ---
        $res = shell_exec('python3 script.py ' . escapeshellarg(json_encode($property_data)));
        echo $res;
    }
} catch (Exception $e) {
    print_r($e);
}
} else {
    echo "Hello Alien";
}
