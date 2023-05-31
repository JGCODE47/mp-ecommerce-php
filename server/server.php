<?php

require __DIR__  . '/../vendor/autoload.php';

//REPLACE WITH YOUR ACCESS TOKEN AVAILABLE IN: https://developers.mercadopago.com/panel/credentials
MercadoPago\SDK::setAccessToken("APP_USR-8902774665784533-092911-fab78ca802b6475923ebb446b02fee62-1160743707");
// Agregar el integrator_id
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

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
$preference->notification_url = `https://jgcode47-mp-ecommerce-php.herokuapp.com/webhooks.php`;

$preference->external_reference = "joga47uk@hotmail.com";
// Crea un objeto de pagador
$payer = new MercadoPago\Payer();
$payer->name = "lalo";
$payer->surname = "landa";
$payer->email = "test_user_94708656@testuser.com";
$payer->address = array(
    'street_name' => "calle falsa",
    'street_number' => "123",
    'zip_code' => "110110"
);
// Otros campos del pagador, si es necesario

// Asigna el pagador a la preferencia
$preference->payer = $payer;

// Resto de tu código
$item = new MercadoPago\Item();
// ...

// Configurar el número máximo de cuotas (mensualidades)
$installments = 6; // Obtener el número de cuotas del formulario
$preference->payment_methods = array(
    'installments' => (int) $installments
);

// Excluir el método de pago indicado en las instrucciones
$excludedPaymentMethod = "VISA"; // Obtener el método de pago a excluir del formulario
$preference->payment_methods->excluded_payment_methods = array(
    array('id' => $excludedPaymentMethod)
);

// Agregar el external_reference correcto
$externalReference = $_POST['referencia_externa']; // Obtener la referencia externa del formulario
$preference->external_reference = $externalReference;
$preference->save();

$response = array(
    'id' => $preference->id,
);
echo json_encode($response);
