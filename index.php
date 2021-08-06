<!doctype html>
<html>
<body>
    Lets get all the messages:
    <?php
        require 'messages.php';

        $messageObj = new Message;
        $allMessages = $messageObj->getAllMessages();
        foreach($allMessages as $message){
            echo "<br>";
            echo $message["message"]."<br>";
            echo $message["type"];
            echo "<br>";
        }
    ?>
</body>
</html>
