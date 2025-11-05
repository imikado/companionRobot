<style>
    body {
        text-align: center;
    }

    .blink_me {
        animation: blinker 1s linear infinite;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }
</style>
<h4 class="blink_me"><?php echo $this->contextList['message'] ?></h4>