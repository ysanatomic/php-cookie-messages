# php-cookie-messages
Taking care of the task of leaving messages to the user without any DB and worries.

The class under message.php handles completely messages saved in cookies. This allows sites to leave success/warning/fail messages for users without using any DB.
> Was needed for a project so it was made. Based after the django messages.

Require the file under all other php files.
```
require 'messages.php';
```

How to send a new message to the user:
```
$messageObj = new Message;
$messageObj->setMessage("heregoesyourmessage");
$messageObj->setType("here goes your type");
$messageObj->commitMessage();
```
Types can be anything but it might be better to stick to: Success, Warning, Danger.

How to fetch all messages and display them (you can add that to every page if you delete the messages after you display them).
```
$messageObj = new Message;
$allMessages = $messageObj->getAllMessages();
foreach($allMessages as $message){
    echo "<br>";
    echo $message["message"]."<br>"; /* get the text of the message */
    echo $message["type"]; /* get the type of the message */
    echo "<br>";
}
```
You can do a foreach and then for every message use `message["message"]` and `message["type"]` to get the message and the type of each message.

It is STRONGLY recommended that after each display of the messages you erase them so they don't get displayed twice. You can do it like this:
```
$messageObj = new Message;
$messageObj->erase();
```

It is simple as that.