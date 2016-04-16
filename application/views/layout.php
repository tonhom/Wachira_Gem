<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wachira Gem&Jewelry</title>
        <link rel="stylesheet" type="text/css" href="<?= base_url("asset/css/semantic.min.css") ?>"/>
        <link rel="stylesheet" type="text/css" href="<?= base_url("asset/css/sweetalert.css") ?>"/>
        <link rel="stylesheet" type="text/css" href="<?= base_url("asset/css/app.css") ?>"/>
        <script src="<?= base_url("asset/js/jquery-2.2.1.min.js") ?>"></script>
        <script src="<?= base_url("asset/js/semantic.min.js") ?>"></script>
        <script src="<?= base_url("asset/js/semantic.min.js") ?>"></script>
        <script src="<?= base_url("asset/js/holder.min.js") ?>"></script>
        <script src="<?= base_url("asset/js/sweetalert.min.js") ?>"></script>
    </head>
    <body>
        <?= $navbar ?>
        <div id="content-container">
            <?= $content ?>
        </div>
        <?= $footer ?>
    </body>
</html>
