<?php

use App\Infrastructure\Pages\SetupPage;

$contact = $this->contextList['contact'];
?>
<form action="" method="POST">

    <input type="hidden" name="action" value="<?php echo SetupPage::ACTION_EDIT ?>" />

    <p>name <input name="name" value="<?php echo $contact->name ?>" /></p>

    <p>url <input name="url" value="<?php echo $contact->url ?>" /></p>

    <p><input type="submit" value="Submit" /></p>

</form>