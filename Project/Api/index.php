<?php

$message = $_GET['message'];


file_put_contents('/var/www/data/message.txt', $message);
