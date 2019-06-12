<?php

namespace frontend\controllers;
use frontend\models\Image;
use Yii;

class TrashController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$data = Image::find()
            ->where(['user_id'=>Yii::$app->user->id,'deleted'=>1])
            ->all();
        return $this->renderPartial('trash',['trash'=>$data]);
    }


    public function actionDeleteall(){
        $data = new Image();
        $data = $data->deleteAllTrash();
        return $this->redirect(Yii::$app->homeUrl.'trash');
    }
}

?>