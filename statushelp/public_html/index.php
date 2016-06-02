<!DOCTYPE html>

        <?php
        $dir = dirname(dirname(__FILE__));    
        require($dir . '/public_html/services/telegramService.php');
        require($dir . '/public_html/services/vkService.php');
        require($dir . '/public_html/models/vkPost.php');
        
        $vkService = new vkService();
        $vkPost = $vkService->getPostFromWall("gorod.orehovozuevo", 1);

        $telegramService = new telegramService();
        $message = $telegramService->createTextMessage("@oznowtest", $vkPost->getText());
        $statusCode = $telegramService->sendMessage($message);
        
        if ($statusCode == 200) {
            echo "сообщение отправили";
        }
        else {
            echo "не удалось отправить сообщение";
        }
        
        ?>
   