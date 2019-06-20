<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
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
</head>
<style>
    * {
        box-sizing: border-box;
    }

    .row {
        display: -ms-flexbox;
    display: flex;
        -ms-flex-wrap: wrap;
    flex-wrap: wrap;
        padding: 0 4px;
        padding-top: 60px;
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
<!--style="overflow-x: hidden;"-->
<body >

<header class="mdc-top-app-bar mdc-top-app-bar--fixed" id="app-bar">
    <div class="mdc-top-app-bar__row">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <a href="<?= Yii::$app->request->referrer ?>" class="demo-menu material-icons mdc-top-app-bar__navigation-icon">keyboard_backspace</a>
            <span class="mdc-top-app-bar__title">Ảnh yêu thích</span>  
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


<div class="mdc-menu mdc-menu-1 mdc-menu-surface">
    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
        <li>
            <span class="mdc-typography mdc-typography--subtitle2" style="padding-left: 15px;">TẠO MỚI</span>
        </li>
        <li class="mdc-list-item" role="menuitem" onclick="window.location.href='<?php echo Yii::$app->homeUrl.'album/addnew'?>'">
            <div class="material-icons" style="color: blue">collections</div>
            <span class="mdc-list-item__text" style="padding-left: 15px;">Album</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <div class="material-icons" style="color: blue">group</div>
            <span class="mdc-list-item__text" style="padding-left: 15px;">Album được chia sẻ</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <div class="material-icons" style="color: blue">movie</div>
            <span class="mdc-list-item__text" style="padding-left: 15px;">Phim</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <div class="material-icons" style="color: blue">filter_none</div>
            <span class="mdc-list-item__text" style="padding-left: 15px;">Hoạt ảnh</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <div class="material-icons" style="color: blue">web</div>
            <span class="mdc-list-item__text" style="padding-left: 15px;">Ảnh ghép</span>
        </li>
    </ul>
</div>
<div class="mdc-menu mdc-menu-2 mdc-menu-surface">
    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1" style="padding:10px;">
        <li>
            <span class="mdc-typography mdc-typography--subtitle2" style="padding-left: 15px;">TÀI KHOẢN</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <div class="material-icons" style="color: blue">account_circle</div>
            <span class="mdc-list-item__text" style="padding-left: 15px;"><?php echo Yii::$app->user->identity->fullname ?></span>
        </li>
<!--        <li class="mdc-list-item" href="">-->
<!--            <button class="mdc-button" style="background-color: blue; color: white;">Đăng Xuất</button>-->
<!--        </li>-->
        <li style="padding-top: 10px;padding-left: 50px;">
            <?php
                echo Html::beginForm(['/site/logout'], 'post');
                echo Html::submitButton(
                    'Đăng Xuất',
                    ['class' => 'mdc-button mdc-button--raised']
                );
                echo Html::endForm();
            ?>
        </li>
    </ul>
</div>

 
    <div class="row">

        <?php

        foreach ($like as $key =>$value) {
            ?>
            <div class="column " style="padding: 5px">
                <a href="<?php echo Yii::$app->homeUrl . "image/detail?id=".$value["image_id"]?>">
                    <div class="container">
                        <img src="<?php echo Yii::$app->homeUrl."frontend/web/".$value["path_image"]?>" class="image">
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
                </a>

            </div>
            <?php
        }
        ?>
    </div>





<script>

    const MDCMenu = mdc.menu.MDCMenu;
    const menu = new MDCMenu(document.querySelector('.mdc-menu-1'));
    menu.setFixedPosition(true);
    menu.hoistMenuToBody(); // Not required if the menu is already positioned on the body
    menu.setAbsolutePosition(1000, 50); //tạm thời set cứng
    menu.open = false;

    function myFunction() {
        menu.open = !menu.open;
    }
    const menu2 = new MDCMenu(document.querySelector('.mdc-menu-2'));
    menu2.setFixedPosition(true);
    menu2.hoistMenuToBody(); // Not required if the menu is already positioned on the body
    menu2.setAbsolutePosition(1130,50); //tạm thời set cứng
    menu2.open = false;
    function myFunction2(){
        menu2.open = !menu2.open;
    }

    const checkbox = new MDCCheckbox(document.querySelector('.mdc-checkbox'));
    const formField = new MDCFormField(document.querySelector('.mdc-form-field'));
    formField.input = checkbox;
</script>
</body>