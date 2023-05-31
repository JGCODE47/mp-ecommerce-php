<?php

require __DIR__  . '/../vendor/autoload.php';

//REPLACE WITH YOUR ACCESS TOKEN AVAILABLE IN: https://developers.mercadopago.com/panel/credentials
MercadoPago\SDK::setAccessToken("APP_USR-8902774665784533-092911-fab78ca802b6475923ebb446b02fee62-1160743707");


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

    $preference->save();

    $response = array(
        'id' => $preference->id,
    ); 
    echo json_encode($response);

