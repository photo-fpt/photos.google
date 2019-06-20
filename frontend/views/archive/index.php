<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\widgets\headerdetailWidget;
use yii\widgets\ActiveForm;
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
   <?php $form = ActiveForm::begin(); ?> 
<header class="mdc-top-app-bar mdc-top-app-bar--fixed" id="app-bar">
    <div class="mdc-top-app-bar__row">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <a href="<?= Yii::$app->homeUrl ?>" class="demo-menu material-icons mdc-top-app-bar__navigation-icon">keyboard_backspace</a>
            <span class="mdc-top-app-bar__title">Lưu trữ</span>  
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-content">
    
            
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">  
            <!-- <a class="material-icons mdc-top-app-bar__action-item" aria-label="Delete_forever" onclick="myFunctionDelete()">delete_forever</a> -->
            <button  class="mdc-button mdc-button--raised" style="color: white; background-color: #651fff">Thêm ảnh</button>
            <a class="material-icons mdc-top-app-bar__action-item" aria-label="User" onclick="myFunction()">more_vert</a>
        </section>
    </div>
</header>

<div class="content">
    <div class="row">    
        <?php foreach ($archive as $key => $value): ?>
            <div class="column " style="padding: 5px">
                <span class="mdc-typography--subtitle2">
                    <?php
                        echo $value["date_create"]." ".$value["location"];
                    ?>
                </span>
                    <div class="container">
                        <img class="image" src="<?php echo Yii::$app->homeUrl."frontend/web/".$value["path_image"]?>">
                        <div class="overlay">
                            <div class="mdc-form-field" style="color: white">
                                <div class="mdc-checkbox">
                                    <input type="checkbox"
                                            name="hinhanh[]" 
                                            value="<?php echo $value['image_id'] ?>" 
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

<!--menu-->
<div class="mdc-menu mdc-menu-surface">
    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
        <a href=""
           style="text-decoration: none; color: black">
            <li class="mdc-list-item" role="menuitem">
                <span class="mdc-list-item__text">Tải xuống</span>
            </li>
        </a>
        <li class="mdc-list-item" role="menuitem">
            <span class="mdc-list-item__text">Xoay</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <span class="mdc-list-item__text">Thêm vào album</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <span class="mdc-list-item__text">Thêm vào album được chia sẽ</span>
        </li>
        <a href=""
           style="text-decoration: none; color: black">
            <li class="mdc-list-item" role="menuitem">
                <span class="mdc-list-item__text">Hủy luu trữ</span>
            </li>
        </a>
    </ul>
</div>


<script>
    //menu header
    const MDCMenu = mdc.menu.MDCMenu;
    const menu = new MDCMenu(document.querySelector('.mdc-menu'));
    menu.open = false;
    menu.setAbsolutePosition(1330, 50);

    function myFunction() {
        menu.open = !menu.open;
    }
</script>
<?php $this->endBody() ?>
</body>
</html>
