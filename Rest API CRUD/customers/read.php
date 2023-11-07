<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Action-Control-Allow-Method:GET');
header('Access-COntrol-Allow: Content-Type,Access-Control-Allow-Header, Authorization, x-Request-with');

include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if($requestMethod == "GET"){

    if(isset($_GET['id'])){

        $customer = getCustomer($_GET);
        echo $customer;
    }else{

    $customerList = getCustomerList();
    echo $customerList;
    }
}
else{
    $data = [
        'status' => 405,
        'message'=> $requestMethod. ' Method Not Allowed',
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);

}
?>
