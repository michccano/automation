<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // receive data
    $property_data = $_POST;
} else {
    $property_data = [
        "post-title-0" => "73 Rufus Street, Milpara WA",
        "property_price" => "",
        "property_size" => "2171",
        "size_postfix" => "sqm",
        "property_id" => "11967360",
        "year_built" => "",
        "photos" => [
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/40480083__1629939683-16541-MI232-1.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/40480090__1629939690-20569-02.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/40480091__1629939692-16450-03.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/40480093__1629939693-1604-04.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/40480094__1629939695-1445-05.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/40480096__1629939696-12417-06.jpg",
            "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/40480097__1629939697-1493-07.jpg",
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
