<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $property_data = ($_POST);
} else {
    $property_data = [
        "post-title-0" => "3 Manley Crescent, Collingwood Heights WA",
        "property_price" => null,
        "property_size" => 769,
        "size_postfix" => "sqm",
        "property_id" => 8197141,
        "year_built" => "",
        "property_type" => "Residential",
        "type_name" => "House",
        "property_status" => "sale",
        "property_address" => "3 Manley Crescent, Western Australia, 6330, Australia",
        "property_description" => [
            "Residential House",
            "769 sqm",
            "Contact Kevin Naylor 9841 1455 for more info."
        ],
        "photos" => [
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/29965673__1622508930-7937-CH007-1.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/29965674__1622508932-2114-04.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/29965675__1622508934-7990-05.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/29965677__1622508935-17825-07.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/29965678__1622508936-2128-08.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/29965680__1622508939-7981-09.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/29965681__1622508940-7813-10.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/29965682__1622508942-7990-12.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/29965683__1622508943-20063-14.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/29965685__1622508945-2105-15.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/29965686__1622508947-8086-16.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/29965687__1622508948-7948-17.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/29965688__1622508950-17884-19.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/29965691__1622508951-2146-20.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/29965695__1622508953-7783-22.jpg"
        ]
    ];
}

try {
    if (count($property_data) > 0) {
        //  --- run script ---
        $res = shell_exec('sudo python3 script.py ' . escapeshellarg(json_encode($property_data)));
        shell_exec('sudo rm *photo*');
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
