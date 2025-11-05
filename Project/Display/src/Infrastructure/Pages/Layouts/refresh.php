<!DOCTYPE html>
<html>

<head>


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <style>
        select {
            font-size: 50px;
        }

        input {
            font-size: 50px;
        }

        body {
            font-size: 50px;
            background: black;
            color: white;
        }

        a {
            color: white;
        }

        a img {
            padding: 4px;
            border: 1px solid white;

        }
    </style>

    <meta http-equiv="refresh" content="5">


</head>

<body>

    <div class="container">
        <?php foreach ($this->contextList['contentList'] as $contentLoop) : ?>
            <?php echo $contentLoop->render(); ?>
        <?php endforeach; ?>
    </div>


</body>

</html>