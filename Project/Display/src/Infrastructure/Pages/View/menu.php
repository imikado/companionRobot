<?php

use App\Infrastructure\Pages\HomePage;
use App\Infrastructure\Pages\MessagesPage;

?>
<style>
    p {
        margin-top: 110px;
        text-align: center;
    }

    span {
        margin-left: 20px;
    }
</style>
<p>
    <a href="<?php echo getLink(HomePage::PAGE) ?>"><img src="<?php echo getPublicPath('/public/images/home-big.png') ?>" /></a>
    <span>&nbsp;</span>
    <a href="<?php echo getLink(MessagesPage::PAGE) ?>"><img src="<?php echo getPublicPath('/public/images/messages-big.png') ?>" /></a>
</p>