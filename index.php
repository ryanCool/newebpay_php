<?php
$key = "your key";
$iv = "your iv";
$mid = "your mid";
$orderNo = $_GET['order_no']; //unique order_no
$amt = $_GET['amt']; //item money 
$email = $_GET['email']; //to set email from url param

//Request like http://localhost:8080?order_no=itsorderno&amt=100&rex78715@gmail.com


$data1 = http_build_query(array(
    'MerchantID' => $mid,
    'Version' => '2.0',
    'RespondType' => 'JSON',
    'TimeStamp'=> time(),
    'MerchantOrderNo'=> $orderNo,
    'Amt' => $amt,
    'CREDIT' => '1',
    'NotifyURL' => 'https://callback_to_your_backend_server_endpoint',
    'ReturnURL' => 'https://return_to_your_frontend_page',
    'Email' => $email,
    'LoginType' => '0',
    'InstFlag' => '0',
    'ItemDesc' => 'item description',
));

$edata1 = bin2hex(openssl_encrypt($data1, "AES-256-CBC", $key,   OPENSSL_RAW_DATA, $iv));
$hashs = "HashKey=" . $key . "&" . $edata1 . "&HashIV=" . $iv;
$hash = strtoupper(hash("sha256", $hashs));
?>


<form name="newebpay" id="newebpay"  method=post action="https://core.newebpay.com/MPG/mpg_gateway">
    <input type="hidden" name="MerchantID" value="<?= $mid ?>" readonly><br>
    <input type="hidden" name="Version" value="2.0" readonly><br>
    <input type="hidden" name="TradeInfo" value="<?= $edata1 ?>" readonly><br>
    <input type="hidden" name="TradeSha" value="<?= $hash ?>" readonly><br>
    <input type=submit style="visibility:hidden">
</form>


<script>            
    document.addEventListener("DOMContentLoaded", function(event) {
            document.createElement('form').submit.call(document.getElementById('newebpay'));
            });         
</script>