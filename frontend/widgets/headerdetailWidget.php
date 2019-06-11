<?php 

	namespace app\widgets;

	use app\models\Product;
    use frontend\models\Image;
    use yii\base\Widget;
	use Yii\helpers\Html;
    use yii\web\NotFoundHttpException;

    class headerdetailWidget extends Widget{

		public $message;

		public function init(){
			parent::init();
		}

		public function run(){
			return $this->render('headerdetailWidget');
		}

        protected function findModel($id)
        {
            if (($model = Image::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }


	}

?>