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



<audio id="sound" controls preload="auto" allow="autoplay">>
    <source src="<?php echo $this->contextList['sound'] ?>" type="audio/mp4">
</audio>

<script>
    var popupsound = document.getElementById("sound");

    function playMessage() {
        popupsound.play(); //play the audio file
        // Change background to dancing rick
        document.body.style.backgroundImage = "url('rick.gif')"

        // Hide the heading and the button
        document.querySelector(".everything").style.display = "none"
    }
    playMessage();
</script>