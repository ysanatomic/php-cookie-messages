<!doctype html>
<html>
<body>

    <form action="#" method="POST">
        <input type="text" id="msg" name="msg">
        <input type="text" id="type" name="type">

        <input type="submit">
    </form>

    <?php
        require 'messages.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $messageObj = new Message;
            $messageObj->setMessage($_POST["msg"]);
            $messageObj->setType($_POST["type"]);
            $messageObj->commitMessage();
            echo "MESSAGE SET";
        }

    ?>
</body>
</html>
