<?php

namespace frontend\controllers;

use frontend\models\Image;

class ImageController extends \yii\web\Controller
{
    public function actionDetail($id)
    {
        $data = new Image();
        $data = $data->getOneImage($id);
        return $this->renderPartial('detail',['data'=>$data]);
    }

}
