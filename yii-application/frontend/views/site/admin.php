<?php


/* @var $this yii\web\View */

use http\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use dosamigos\fileupload\FileUpload;
use yii\widgets\ActiveForm;
use frontend\models\Picture;
use frontend\modules\picture\models\forms\PictureForm;
use frontend\modules\picture\Module;
use frontend\modules\picture\controllers\DefaultController;

$this->title = 'Панель администратора';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('/js/adminka.js',
    ['depends' => [\yii\web\JqueryAsset::className()]])
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <h3>Создать новый альбом</h3>
    <div class="row">
        <form action="">
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="title" placeholder="Введите название альбома">
            </div>
            <div class="form-row">
                <button type="submit" class="btn btn-primary mb-2 formBtn" id="btn">Создать альбом</button>
            </div>
        </form>
    </div>

    <h3>Добавить фото в альбом</h3>
    <div class="row">
        <form action="">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputState">Выберите альбом</label>
                    <select id="inputState" class="form-control">
                        <?php foreach ($albums as $album): ?>
                            <option><?php echo $album->title ?></option>
                        <?php endforeach; ?>            </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputState">Выберите фото</label>
                    <?= FileUpload::widget([
                        'model' => $modelPicture,
                        'attribute' => 'picture',
                        'url' => ['site/upload-picture'],
                        'options' => ['accept' => 'image/*'],
                        'clientOptions' => [
                            'maxFileSize' => 2000000
                        ],
                        'clientEvents' => [
                            'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                            'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                        ],
                    ]); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-success formBtn">Добавить фото в альбом</button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php

//echo \Yii::$app->view->renderFile('../modules/picture/views/default/download.php');

?>