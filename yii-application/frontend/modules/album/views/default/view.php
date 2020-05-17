<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;

$this->params['breadcrumbs'][] = ['label' => 'My gallery', 'url' => ['/site/gallery']];
$this->params['breadcrumbs'][] = $this->title;

if (Yii::$app->user->isGuest) {
    return Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
}
?>

<h1><?= Html::encode($this->title) ?></h1>

<? echo Html::a('Delete this album', (['delete', 'name' => $name, 'pictures'=>$pictures]), ['class' => 'btn btn__back']) ?>


<div class="container-fluid">

    <div class="masonry-layout">

        <?php foreach ($pictures as $picture): ?>
            <div class="masonry-layout__panel">
                <div class="masonry-layout__panel-content">
                    <a href="<?php echo Url::to(['/picture/default/view', 'id' => $picture->id]) ?>"><img
                                src="/uploads/<?php echo $picture->filename ?>" alt="" class="picture__img"></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>