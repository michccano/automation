<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // test that reciving curl post
    // create_file();

    $property_data = ($_POST);

// $pics = json_decode($property_data['photos']);

// print_r($property_data);


} else {
    $property_data = [
        "post-title-0" => "Demo Post",
        "property_price" => "",
        "property_size" => 749,
        "size_postfix" => "sqm",
        "property_id" => 9110094,
        "year_built" => 1973,
        "property_type" => "Residential",
        "type_name" => "House",
        "property_status" => "sale",
        "property_address" => "16 Evans Road, Western Australia, 6330, Australia",
        "property_description" => [
            "Residential",
            "749 sqm",
            "Contact Kathleen Mier 08 9841 1455 for more info."
        ],
        "photos" => [
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/40480083__1629939683-16541-MI232-1.jpg",
        ]
    ];
}

 try {
     if (count($property_data) > 0) {
         //  --- run script ---
         $res = shell_exec('sudo python3 script.py ' . escapeshellarg(json_encode($property_data)));
         shell_exec('sudo rm photo*');
         echo $res;
     }
 } catch (Exception $e) {
     print_r($e);
 }


function create_file()
{
    $file = dirname(__FILE__) . "/post_data.txt";
    $open = fopen($file, "a");
    $write = fputs($open, "received here");
    fclose($open);
}
