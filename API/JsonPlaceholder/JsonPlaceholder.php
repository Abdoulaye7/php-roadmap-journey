<?php

class jsonplaceholder{
    private string $url;

    public function __construct(string $url){
        $this->url = $url;
    }
    
    public function getTodos():?array{
        $curl = curl_init($this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($curl);

        $posts = [];

        if($data === null){
            var_dump(curl_error($curl));
        }else{
            $posts = json_decode($data,true);
      
        }
        return $posts;
    }
    public function createTodo(string $title, bool $completed, int $userId): ?array {
        $data = [
            'title' => $title,
            'completed' => $completed,
            'userId' => $userId
        ];

        $curl = curl_init($this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); 

        $response = curl_exec($curl);

        if ($response === false) {
            var_dump(curl_error($curl));
        } else {
            return json_decode($response, true); // Retourne la tâche créée
        }

        curl_close($curl);
        return null;
    }
}



?>