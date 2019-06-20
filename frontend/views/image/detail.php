<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use app\widgets\headerdetailWidget;
use yii\helpers\Url;

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Ảnh</title>
    <?php $this->head() ?>

    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl ?>css/style.css">
    <style>
        .header-detail {
            background-color: rgba(0, 0, 0, 0.3);
        }

        body {
            background-color: black;
            display: flex;
            height: 100vh;
        }

        /* .image-show{
            display: block;
             margin-left: 0 auto;
             margin-right: 0 auto;
        } */
        /* .img-center{
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
        } */
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

        .mdc-drawer {
            width: 260px;
        }

        * {
            box-sizing: border-box
        }

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
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
            transform: translate(-50%, -50%);
        }


        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding-left: 30px;
            padding-right: 30px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 25px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }
            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }
            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .prev, .next, {
                font-size: 11px
            }
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
        <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell--span-4"><b><?php echo "Tên hình:" ?></b></div>
                <br>
                <div class="mdc-layout-grid__cell--span-8"><?php echo $data["image"]; ?></div>
                <div class="mdc-layout-grid__cell--span-6"><b><?php echo "Ngày, giờ tải lên:" ?></b></div>
                <br>
                <div class="mdc-layout-grid__cell--span-6"><?php echo $data["date_create"]; ?></div>
            </div>
        </div>


    </header>
</aside>

<div class="mdc-drawer-app-content" id="main-content">

    <header class="mdc-top-app-bar app-bar header-detail" id="app-bar">
        <div class="mdc-top-app-bar__row">
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                <a href="<?= Yii::$app->homeUrl ?>" class="material-icons mdc-top-app-bar__action-item"
                   aria-label="Backspace">keyboard_backspace</a>
            </section>

            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-content">

            </section>

            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
                <a onclick="functionShare()" class="material-icons mdc-top-app-bar__action-item" aria-label="Create">share_outline</a>
                <a class="material-icons mdc-top-app-bar__action-item" aria-label="Upload">tune</a>
                <a class="material-icons mdc-top-app-bar__action-item" aria-label="User">zoom_in</a>
                <a class="material-icons mdc-top-app-bar__navigation-icon " aria-label="Create">infor</a>
                <!--                <a href="#" class="material-icons mdc-top-app-bar__action-item" aria-label="Upload">star_border</a>-->

                <button id="add-to-favorites wist"
                        onclick="window.location.href='<?php echo Yii::$app->homeUrl . "site/wistlist?id=" . $data["image_id"] ?>'"
                        class="mdc-icon-button wist"
                        aria-label="Add to favorites"
                        aria-hidden="true"
                        aria-pressed="false">
                    <?php
                    if ($data['wistlist'] == 1) {
                        ?>
                        <i name="name" class="material-icons mdc-icon-button__icon">star_rate</i>
                        <?php
                    } else {
                        ?>
                        <i name="name" class="material-icons mdc-icon-button__icon">star_border</i>
                        <?php
                    }
                    ?>

                </button>

                <a class="material-icons mdc-top-app-bar__action-item" aria-label="User" onclick="myFunctionDelete()">delete_outline</a>
                <a class="material-icons mdc-top-app-bar__action-item" aria-label="User" onclick="myFunction()">more_vert</a>
            </section>
        </div>
    </header>
    <!--menu-->
    <div class="mdc-menu mdc-menu-surface">
        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
            <li class="mdc-list-item" role="menuitem">
                <span class="mdc-list-item__text">Trình chiếu</span>
            </li>
            <a href="<?php echo Yii::$app->homeUrl . "image/download?id=" . $data["image_id"] ?>"
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
            <a href="<?php echo Yii::$app->homeUrl . "image/archive?id=" . $data["image_id"] ?>"
               style="text-decoration: none; color: black">
                <li class="mdc-list-item" role="menuitem">
                    <span class="mdc-list-item__text">Luu trữ</span>
                </li>
            </a>
        </ul>
    </div>

    <!-- menu delete -->
    <div class="mdc-menu mdc-menu-delete mdc-menu-surface">
        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
            <li>
                <span class="mdc-typography mdc-typography--subtitle1" style="padding-left: 15px;">Bạn có muốn xóa hình ảnh này?</span>
            </li>
            <li class="mdc-list-item" role="menuitem">
                <button class="mdc-button" onclick="functionHuyDelete()">Hủy</button>
                <button class="mdc-button mdc-button--raised"
                        onclick="window.location.href='<?php echo Yii::$app->homeUrl . "image/delete?id=" . $data["image_id"] ?>'">
                    Chuyển vào thùng rác
                </button>
            </li>
        </ul>
    </div>
    <!--    menu share-->
    <div class="mdc-menu mdc-menu-share mdc-menu-surface">

        <?php $form = ActiveForm::begin(['action' => 'send']) ?>
        <span class="mdc-typography mdc-typography--subtitle1" style="padding-left: 15px;">Đến: </span>
        <input type="text" class="mdc-text-field__input" name="share">
        <span class="mdc-typography mdc-typography--subtitle1" style="padding-left: 15px;">Nội dung</span>
        <input type="text" class="mdc-text-field__input" name="mes">
        <button class="mdc-button mdc-button--raised" type="submit" name="submit">Gửi</button>
        <?php ActiveForm::end() ?>
    </div>

    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="<?php echo Yii::$app->homeUrl . "frontend/web/" . $data["path_image"] ?>">
        </div>

        <?php foreach ($data2 as $key => $value): ?>

            <div class="mySlides fade">
                <img src="<?php echo Yii::$app->homeUrl . "frontend/web/" . $value["path_image"] ?>">
            </div>

        <?php endforeach ?>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

</div>

<script>

    mdc.autoInit();
    // xem thong tin
    var drawer = new mdc.drawer.MDCDrawer(document.querySelector('.mdc-drawer'));
    const topAppBar = mdc.topAppBar.MDCTopAppBar.attachTo(document.getElementById('app-bar'));
    topAppBar.setScrollTarget(document.getElementById('main-content'));
    topAppBar.listen('MDCTopAppBar:nav', () => {
        drawer.open = !drawer.open;
    });
    //menu header
    const MDCMenu = mdc.menu.MDCMenu;
    const menu = new MDCMenu(document.querySelector('.mdc-menu'));
    menu.open = false;
    menu.setAbsolutePosition(1330, 50);

    function myFunction() {
        menu.open = !menu.open;
    }

    //menu xóa
    const menudelete = new MDCMenu(document.querySelector('.mdc-menu-delete'));
    menudelete.open = false;
    menudelete.setAbsolutePosition(1300, 50);

    function myFunctionDelete() {
        menudelete.open = !menudelete.open;
    }

    function functionHuyDelete() {
        menudelete.close = !menudelete.close;
    }

    //menu share
    const menushare = new MDCMenu(document.querySelector('.mdc-menu-share'));
    menushare.open = false;
    menushare.setAbsolutePosition(500, 100);

    function functionShare() {
        menushare.open = !menushare.open;
    }

    function changeInputShare() {
        alert('ok');
    }

    //slide
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }

</script>
<?php $this->endBody() ?>
</body>
</html>
