<?php

namespace frontend\controllers;

class SearchController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }

}
