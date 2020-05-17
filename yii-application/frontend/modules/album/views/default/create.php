<?php
/* @var $this yii\web\View */

/* @var $model frontend\modules\album\models\forms\AlbumForm */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Create album';
$this->params['breadcrumbs'][] = $this->title;

if (Yii::$app->user->isGuest) {
    return Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
}
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="album-default-index col-md-4">


    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'name'); ?>
    <?php echo Html::submitButton('Download'); ?>

    <?php ActiveForm::end(); ?>

</div>
