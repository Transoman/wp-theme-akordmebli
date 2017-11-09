<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

$token = "468248552:AAGAhCAAyCpcmkgy2j6vCEP9GuV2k65SuD8";

$chat_id = "-183093892";



$arr = array(

	"Ім'я: " => $name,

	"Телефон: " => $phone,

	"Повідомлення: " => $message

);



foreach ($arr as $key => $value) {

	$txt .= '<b>' . $key . '</b> ' . $value . "%0A";

}



$sendToTelegram = @fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");

?>