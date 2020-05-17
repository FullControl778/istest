<?php
/* @var $this yii\web\View */

/* @var $model frontend\modules\post\models\forms\PictureForm */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Download picture';
$this->params['breadcrumbs'][] = $this->title;

if (Yii::$app->user->isGuest) {
    return Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
}
?>

<h1><?= Html::encode($this->title) ?></h1>
<div class="picture-default-index col-md-4">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'picture')->fileInput(); ?>
    <?php echo $form->field($model, 'album')->dropDownList($items); ?>
    <?php echo Html::submitButton('Download'); ?>

    <?php ActiveForm::end(); ?>

</div>
