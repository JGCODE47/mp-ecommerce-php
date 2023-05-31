<?php

require __DIR__  . '/../vendor/autoload.php';

//REPLACE WITH YOUR ACCESS TOKEN AVAILABLE IN: https://developers.mercadopago.com/panel/credentials
MercadoPago\SDK::setAccessToken("TEST-6077109975925282-092815-14c26c2c515e7e7a560e2d51822abe43-195885622");


    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();
    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = $_POST["name_product"];
    $item->quantity = $_POST["unit"];
    $item->unit_price = $_POST["price"];
    $preference->items = array($item);
    
    $preference->back_urls = array(
        "success" => "https://jgcode47-mp-ecommerce-php.herokuapp.com/status.php",
        "failure" => "https://jgcode47-mp-ecommerce-php.herokuapp.com/status.php", 
        "pending" => "https://jgcode47-mp-ecommerce-php.herokuapp.com/status.php"
    );
    $preference->auto_return = "approved"; 

    $preference->save();

    $response = array(
        'id' => $preference->id,
    ); 
    echo json_encode($response);

