<?php
//https://api.telegram.org/bot1655001833:AAHu9mPHk6fnlXcRwZN1x5O2hDUj7xrRCPg/getUpdates,
//



$comment = $_POST['comment'];

$token = "1655001833:AAHu9mPHk6fnlXcRwZN1x5O2hDUj7xrRCPg";
$chat_id = "-494292070";

$arr = array(
'Текст ответа: ' => $comment
    );

foreach ($arr as $key => $value) {
$txt .= "<b>".$key."</b> ".$value."%0A";
}

$send_to_telegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}
&parse_mode=html&text={$txt}", "r");

if ($send_to_telegram) {
    echo '<h1 class="alert-success">Спасибо за оставленный ответ!</h1>';
    header('Location: MainPost.blade.php');
    return true;
}
else{

}

?>
