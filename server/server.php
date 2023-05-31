<?php 
require __DIR__ . '/../vendor/autoload.php';

MercadoPago\SDK::setAccessToken("APP_USR-8902774665784533-092911-fab78ca802b6475923ebb446b02fee62-1160743707");
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

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

// Asigna el pagador a la preferencia
$preference->payer = $payer;

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = $_POST["name_product"];
$item->quantity = $_POST["unit"];
$item->unit_price = $_POST["price"];
$preference->items = array($item);

// Configurar el número máximo de cuotas (mensualidades)
$installments = 6; // Obtener el número de cuotas del formulario
$preference->payment_methods = array(
    'installments' => (int)$installments
);

$excludedPaymentMethod = "visa"; // Obtener el método de pago a excluir del formulario
$preference->payment_methods = array(
    'excluded_payment_methods' => array(
        array('id' => $excludedPaymentMethod)
    )
);


$preference->back_urls = array(
    "success" => "https://jgcode47-mp-ecommerce-php.herokuapp.com/status.php",
    "failure" => "https://jgcode47-mp-ecommerce-php.herokuapp.com/status.php",
    "pending" => "https://jgcode47-mp-ecommerce-php.herokuapp.com/status.php"
);

$preference->notification_url = "https://jgcode47-mp-ecommerce-php.herokuapp.com/webhooks.php";

$preference->external_reference = "joga47uk@hotmail.com";

$preference->save();

$response = array(
    'id' => $preference->id,
);
echo json_encode($response);
