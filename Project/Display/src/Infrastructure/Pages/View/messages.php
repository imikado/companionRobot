<?php

use App\Infrastructure\Pages\HomePage;
?>
<style>
    p {
        text-align: right;

    }
</style>



<form action="" method="POST">
    <p><a href="<?php echo getLink(HomePage::PAGE) ?>"><img src="<?php echo getPublicPath('/public/images/home.png') ?>" /></a>

        <span style="padding-left:30px">&nbsp;</span>
        TO <select name="to">
            <?php foreach ($this->contextList['contactList'] as $contactLoop): ?>
                <option value="<?php echo $contactLoop->name ?>"><?php echo $contactLoop->name ?></option>
            <?php endforeach; ?>

        </select>
    </p>

    <p>
        <select name="message">
            <?php foreach ($this->contextList['messageList'] as $idLoop => $messageLoop): ?>
                <option value="<?php echo $idLoop ?>"><?php echo $messageLoop ?></option>
            <?php endforeach; ?>

        </select>

        <input type="submit" value="Send" />
    </p>


</form>