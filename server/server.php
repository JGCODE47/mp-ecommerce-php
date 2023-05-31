<?php

require __DIR__  . '/../vendor/autoload.php';

//REPLACE WITH YOUR ACCESS TOKEN AVAILABLE IN: https://developers.mercadopago.com/panel/credentials
MercadoPago\SDK::setAccessToken("APP_USR-6077109975925282-092815-2835b9088a8e0364c5ebef48ec8743f4-195885622");


    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();
    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = $_POST["name_product"];
    $item->quantity = $_POST["unit"];
    $item->unit_price = $_POST["price"];
    $preference->items = array($item);
    
    $preference->back_urls = array(
        "success" => "http://localhost:8080/feedback",
        "failure" => "http://localhost:8080/feedback", 
        "pending" => "http://localhost:8080/feedback"
    );
    $preference->auto_return = "approved"; 

    $preference->save();

    $response = array(
        'id' => $preference->id,
    ); 
    echo json_encode($response);

