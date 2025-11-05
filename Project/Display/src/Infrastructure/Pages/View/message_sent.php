<?php

use App\Infrastructure\Pages\HomePage;

?>
<style>
    p {
        text-align: center;
        color: white;
    }
</style>
<p>
    <a href="<?php echo getLink(HomePage::PAGE) ?>"><img src="<?php echo getPublicPath('/public/images/home.png') ?>" /></a>
</p>
<p>Message sent!</p>