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
            <span class="mdc-top-app-bar__title">Thùng rác</span>
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-content">


        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
            <a class="material-icons mdc-top-app-bar__action-item" aria-label="ReDelete" >history</a>
            <a class="material-icons mdc-top-app-bar__action-item" aria-label="Delete_forever" onclick="myFunctionDelete()">delete_forever</a>
            <a class="material-icons mdc-top-app-bar__action-item" aria-label="Delete_forever" onclick="myFunctionClear()">clear</a>
        </section>
    </div>
</header>

<div class="content">
    <div class="row">
        <?php foreach ($image as $key => $value): ?>

            <div class="column " style="padding: 5px">
                <div class="container">
                    <img class="image" src="<?php echo Yii::$app->homeUrl."frontend/web/".$value["path_image"]?>">
                    <div class="overlay">
                        <div class="mdc-form-field" style="color: white">
                            <div class="mdc-checkbox">
                                <input type="checkbox"
                                       class="mdc-checkbox__native-control"
                                       id="checkbox-1" style="color: white" />
                                <div class="mdc-checkbox__background">
                                    <svg class="mdc-checkbox__checkmark"
                                         viewBox="0 0 24 24">
                                        <path class="mdc-checkbox__checkmark-path" fill="none"  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                    </svg>
                                    <div class="mdc-checkbox__mixedmark"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach ?>
    </div>
</div>

<div class="mdc-menu mdc-menu-delete mdc-menu-surface">
    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
        <li style="padding-top: 10px;padding-left: 10px;padding-right: 20px;">
            <span class="mdc-typography mdc-typography--subtitle1" style="padding-left: 15px;">Bạn muốn xóa vĩnh viễn ảnh này?</span>
        </li>
        <li role="menuitem" style="padding-right: 20px;padding-top: 25px;padding-left: 130px;padding-bottom: 10px;">
            <button class="mdc-button" onclick="functionHuyDelete()">Hủy</button>
            <button class="mdc-button mdc-button--raised" onclick="window.location.href='<?php echo Yii::$app->homeUrl."trash/deleteone"?>'">Xóa</button>
        </li>
    </ul>
</div>

<div class="mdc-menu mdc-menu-clear mdc-menu-surface">
    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
        <li style="padding-right: 20px;padding-top: 10px;padding-left: 10px;">
            <span class="mdc-typography mdc-typography--subtitle1" style="padding-left: 15px;">Bạn muốn xóa sạch thùng rác?</span>
        </li>
        <li  role="menuitem" style="padding-right: 20px;padding-top: 25px;padding-left: 120px;padding-bottom: 10px;">
            <button class="mdc-button" onclick="functionHuyClear()">Hủy</button>
            <button class="mdc-button mdc-button--raised" onclick="window.location.href='<?php echo Yii::$app->homeUrl."trash/deleteall"?>'">Xóa</button>
        </li>
    </ul>
</div>


<script>
    const MDCMenu = mdc.menu.MDCMenu;
    const menudelete = new MDCMenu(document.querySelector('.mdc-menu-delete'));
    menudelete.open = false;
    menudelete.setAbsolutePosition(1300, 50);
    function myFunctionDelete(){
        menudelete.open = !menudelete.open;
    }
    function functionHuyDelete(){
        menudelete.close = !menudelete.close;
    }

    const menuclear = new MDCMenu(document.querySelector('.mdc-menu-clear'));
    menuclear.open = false;
    menuclear.setAbsolutePosition(1300, 50);
    function myFunctionClear(){
        menuclear.open = !menuclear.open;
    }
    function functionHuyClear(){
        menuclear.close = !menuclear.close;
    }

</script>
<?php $this->endBody() ?>
</body>
</html>
