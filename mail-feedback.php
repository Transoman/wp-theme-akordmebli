<?php

require_once 'inc/recaptchalib.php';

$post = (!empty($_POST)) ? true : false;
if($post) {
	$name = htmlspecialchars(trim($_POST['name']));
	$email = htmlspecialchars(trim($_POST["email"]));
	$message = htmlspecialchars(trim($_POST['message']));

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
			if(!$email) {$error .= 'Вкажіть Ваш email. ';}
			if(!$message) {$error .= 'Вкажіть Ваше повідомлення. ';}

			if(!$error) {
				$address = "akordmebli@gmail.com";
				$sub = "Повідомлення з сайту Акорд Меблі";
				$mes = "Ім'я: ".$name."\n\nE-mail: " .$email."\n\nПовідомлення: ".$message."\n\n";
				$send = mail ($address,$sub,$mes,"Content-type:text/plain; charset = UTF-8\r\nReply-To:$email\r\nFrom:$name <contact>");

				if($send) {echo 'OK';}
			}
			else {echo '<div class="err">'.$error.'</div>';}
		}
		else {
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