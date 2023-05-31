
<?php
    require_once 'vendor/autoload.php';

    MercadoPago\SDK::setAccessToken("TEST-6077109975925282-092815-14c26c2c515e7e7a560e2d51822abe43-195885622");

    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = (float)$_POST['transactionAmount'];
    $payment->token = $_POST['token'];
    $payment->description = $_POST['description'];
    $payment->installments = (int)$_POST['installments'];
    $payment->payment_method_id = $_POST['paymentMethodId'];
    $payment->issuer_id = (int)$_POST['issuer'];
    $payment->notification_url = `https://jgcode47-mp-ecommerce-php.herokuapp.com/webhooks.php`;
    $response = array(
        'status' => $payment->status,
        'status_detail' => $payment->status_detail,
        'id' => $payment->id
    );
    echo json_encode($response);

?>
