<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // test that reciving curl post
    // create_file();

    $property_data = ($_POST);

//    $pics = json_decode($property_data['photos']);

// print_r($property_data);


} else {
    $property_data = [
        "post-title-0" => "7123",
        "property_price" => "",
        "property_size" => "2171",
        "size_postfix" => "sqm",
        "property_id" => "11967360",
        "year_built" => "",
        "photos" => [
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/40480083__1629939683-16541-MI232-1.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/40480090__1629939690-20569-02.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/40480091__1629939692-16450-03.jpg",
        ]
    ];
}

 try {
     if (count($property_data) > 0) {
         //  --- run script ---
         $res = shell_exec('python3 script.py ' . escapeshellarg(json_encode($property_data)));
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
