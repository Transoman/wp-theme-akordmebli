<?php

require_once 'inc/recaptchalib.php';

$post = (!empty($_POST)) ? true : false;
if($post) {
	$name = htmlspecialchars(trim($_POST['in-order-name']));
	$phone = htmlspecialchars(trim($_POST["in-order-phone"]));
	$message = htmlspecialchars(trim($_POST['in-order-message']));
	$product = htmlspecialchars(trim($_POST['product']));

	$secret = '6LfTHzYUAAAAAM6qlw9lrIpqrWwYixTKq5DEnf4d';
	$response = null;
	$reCaptcha = new ReCaptcha($secret);

	if($_POST['g-recaptcha-response']) {
		$response = $reCaptcha->verifyResponse(
			$_SERVER["REMOTE_ADDR"],
			$_POST["g-recaptcha-response"]
		);

		$error = '';

		if($response != null && $response->success) {
			if(!$name) {$error .= 'Вкажіть Ваше ім\'я. ';}
			if(!$phone) {$error .= 'Вкажіть Ваш телефон. ';}

			if(!$error) {
				$address = "akordmebli@gmail.com";
				$sub = "Замовлення товару: " . $product . " з сайту Акорд Меблі";
				$mes = "Ім'я: ".$name."\n\nНомер телефону: " .$phone. "\n\nТовар: " . $product ."\n\nПовідомлення: ".$message."\n\n";
				$send = mail ($address,$sub,$mes,"Content-type:text/plain; charset = UTF-8\r\nReply-To:$email\r\nFrom:$name <contact>");

				require_once 'inc/telegram.php';

				if($send) {echo 'OK';}
			}
			else {echo '<div class="err">'.$error.'</div>';}
		}
		else {
			var_dump($response);
			$error .= 'Ви не пройшли каптчу. Спробуйте ще раз.';
			echo '<div class="err">'.$error.'</div>';
		}
	}
	else {
		$error .= 'Ви не ввели каптчу.';
		echo '<div class="err">'.$error.'</div>';
	}

}

?>