<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// receive data
$property_data = $_POST;

// $property_data = [
//     "post-title-0" => "post title",
//     "property_price" => "1000",
//     "property_size" => "1200",
//     "size_postfix" => "sq ft",
//     "property_id" => "1234",
//     "year_built" => "2000"
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
