<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$myText = "ah?";
$possibiliRisposte = array(
	"Sei paragonabile a Messimiliano Boia",
	"Fatti affiancare da qualcuno che sappia usare questi strumenti",
	"Sei un incompetente",
	"Ciao Jooseppe Fedina"
);

if(strcmp($text, "blasta") === 0 || strcmp($text, "Giuseppe")) {
	$myText = $possibiliRisposte[rand(0, 3)];
}

header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $myText);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
