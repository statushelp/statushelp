<?php

class vkService {

    private $vkUrl = "https://api.vkontakte.ru/method/";
    
    public function getPostFromWall($groupName, $count) {
        $apiUrl = $this->vkUrl.
                  "wall.get?domain=" . $groupName . "&count=" . $count;
        
        $jsonPosts = file_get_contents($apiUrl);
        $arrayPosts = json_decode($jsonPosts);
        $post = $arrayPosts->response[1];
        $vkPost = new vkPost($post->id, strip_tags($post->text));
        return $vkPost;
        
    }
}
