<?php


// 受信文字列取得
$text = $_POST["text"];


// IncomingWebHookへ送信
$payload = array(
		"channel" => "#{$_POST["channel_name"]}",
		"attachments" => array(
				array(
						"fallback" => "ラッスンゴレライ！お願いします！",
						"pretext" => "ラッスンゴレライ！　".$text." ってなんですのーん？！",
						"color" => "#E4969D",
						"fields" => array(
								array(
										"short" => "false"
								)
						)
				)
		)
);




// IncomingWebHookへ送信
	$curl = curl_init("IncomingWebHookURL");
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_HTTPHEADER, 'Content-type: application/json');
	curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($curl);
	curl_close($curl);


?>
