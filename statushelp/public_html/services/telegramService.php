<?php

class telegramService {

    //Настройки. Нужно вынести от сюда 
    private $telegramUrl = "https://api.telegram.org/";
    private $botToken = "bot168423013:AAEM_D5oMqZdelNWy-r4R83C7F7u6szXiEI";
    
    public function sendMessage($message) {
        
        $ch = curl_init($this->telegramUrl . 
                        $this->botToken .
                        "/sendMessage");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responce = curl_exec($ch);
        $httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch); 
        return $httpCode;
        
    }
    
    public function createTextMessage($chatId, $text) {
        $messageText = urldecode($text);
        $message = array('chat_id' => $chatId, 'text' => $messageText);
        return json_encode($message);     
    }
}
