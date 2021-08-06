<?php
    class Message {
        public $type = "Success"; // types can be Success, Warning, Danger - Success is default
        public $message = ""; // the actual message

        function setMessage($message){
            $this->message = $message;
        }
        function setType($type) {
            $this->type = $type;
        }

        function commitMessage(){ // sets it in the cookie -> is executd after the message and the type have been set
            $message = array(
                "type" => $this->type,
                "message" => $this->message,
            );
            if(isset($_COOKIE["messages"])){
                $messages = array_values(json_decode($_COOKIE["messages"], true));

                array_push($messages, $message);
                setcookie("messages", json_encode($messages));
            } else{
                $messages = array();
                array_push($messages, $message);
                setcookie("messages", json_encode($messages));
            }
        }
        function getAllMessages(){ // this gets you all of the messages
            if(isset($_COOKIE["messages"])){
                $messages = array_values(json_decode($_COOKIE["messages"], true));
                return $messages;
            }
            else {
                return array();
            }
        }
        function erase(){ // you should execute that every time after you get all the messages
            unset($_COOKIE["messages"]);
            setcookie("messages", null);
        }

    }
?>