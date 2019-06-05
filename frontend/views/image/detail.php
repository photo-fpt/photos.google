<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\widgets\headerdetailWidget;


?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl?>css/style.css">
    <style>
        .header-detail{
            background-color:rgba(0, 0, 0, 0.3);
        }
        body{
            background-color: black;
            display: flex;
            height: 100vh;
        }
        /* .image-show{
            display: block;
             margin-left: 0 auto;
             margin-right: 0 auto;
        } */
        .img-center{
            display: block;
            margin-left: auto;
            margin-right: auto;

            width: auto;
            height: auto;
            max-height: 100%;
            max-width: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        .mdc-drawer-app-content {
            flex: auto;
            overflow: auto;
            position: relative;
        }

        .main-content {
            overflow: auto;
            height: 100%;
        }

        .app-bar {
            position: absolute;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>
<aside class="mdc-drawer mdc-drawer--dismissible">
    <header class="mdc-top-app-bar app-bar header-detail" style="background-color: white; color: black;">
        <div class="mdc-top-app-bar__row">
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                <a href="#" class="mdc-icon-button material-icons" aria-label="Backspace" onclick="close()">close</a>
                <span class="mdc-typography--subtitle1">Thông tin</span>
            </section>
        </div>
    </header>
</aside>

<div class="mdc-drawer-app-content" id="main-content">

    <?= headerdetailWidget::widget(); ?>

    <img class="img-center" src="<?php echo Yii::$app->homeUrl."frontend/web/".$data["path_image"]?>">

</div>

<script>

    mdc.autoInit();

    var drawer = new mdc.drawer.MDCDrawer(document.querySelector('.mdc-drawer'));
    const topAppBar = mdc.topAppBar.MDCTopAppBar.attachTo(document.getElementById('app-bar'));
    topAppBar.setScrollTarget(document.getElementById('main-content'));
    topAppBar.listen('MDCTopAppBar:nav', () => {
        drawer.open = !drawer.open;
    });
    function close() {
        alert("okok");
    }
</script>
<?php $this->endBody() ?>
</body>
</html>
