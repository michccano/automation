<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // receive data
    $property_data = $_POST;

    try {
        if (count($data) > 0) {
            //  --- run script ---
            $r = shell_exec("python3 script.py" . escapeshellarg(json_encode($property_data)));
            echo $r;
        }
    } catch (Exception $e) {
        print_r($e);
    }
} else {
    echo "Hello Alien";
}
