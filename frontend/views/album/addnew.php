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
        .content{
            padding-top: 65px;
            padding-left: 20px;
            padding-right: 20px;
        }
        * {
            box-sizing: border-box;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding: 0 4px;
        }

        /*/ Create four equal columns that sits next to each other /*/
        .column {
            -ms-flex: 25%;
            flex: 25%;
            max-width: 25%;
            padding: 0 4px;
        }

        .column img {
            margin-top: 8px;
            vertical-align: middle;
        }

        /*/ Responsive layout - makes a two column-layout instead of four columns /*/
        @media screen and (max-width: 800px) {
            .column {
                -ms-flex: 50%;
                flex: 50%;
                max-width: 50%;
                float: left;
            }
        }

        /*/ Responsive layout - makes the two columns stack on top of each other instead of next to each other /*/
        @media screen and (max-width: 600px) {
            .column {
                -ms-flex: 100%;
                flex: 100%;
                max-width: 100%;
            }
        }
        * {box-sizing: border-box;}

        .container {
            position: relative;

        }

        .image {
            display: block;
            width: 100%;
            height: auto;
        }

        .overlay {
            position: absolute;
            top: 0;
            background: rgb(0, 0, 0);
            background: rgba(0, 0, 0, 0.2);
            color: #f1f1f1;
            width: 100%;
            transition: .5s ease;
            opacity:0;
            color: white;
            font-size: 20px;
            padding: 1%;
            text-align: left;
        }

        .container:hover .overlay {
            opacity: 1;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<header class="mdc-top-app-bar mdc-top-app-bar--fixed" id="app-bar">
    <div class="mdc-top-app-bar__row">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <a href="<?= Yii::$app->homeUrl ?>" class="demo-menu material-icons mdc-top-app-bar__navigation-icon">keyboard_backspace</a>
            <span class="mdc-top-app-bar__title">Thêm mới album</span>
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-content">


        </section>
    </div>
</header>

<div class="content">

</div>
<?php $this->endBody() ?>
</body>
</html>
