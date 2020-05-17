<?php

use yii\helpers\Html;


$this->params['breadcrumbs'][] = ['label' => 'My gallery', 'url' => ['/site/gallery']];
$this->params['breadcrumbs'][] = ['label' => $picture->album, 'url' => ['/album/' . $picture->album]];
$this->params['breadcrumbs'][] = $this->title;

$forTitle = $picture->album;

$pageTitle = "Photo from album: <span class='secHeader__mark'>$forTitle</span>";

echo \Yii::$app->view->renderFile('../views/layouts/header.php', [
    'pageTitle' => $pageTitle
]);

if (Yii::$app->user->isGuest) {
    return Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
}
?>


<div class="container-fluid">
    <div class="col picture__view-container">
        <img src="/uploads/<?php echo $picture->filename ?>" alt="" class="picture__view-img">
    </div>
    <div class="picture__view-timestamp col text-center">
        <? echo Html::a('Delete', (['delete', 'id' => $picture->id]), ['class' => 'btn btn__back']) ?>
        <span>Picture downloaded: <?php echo date('m/d/Y', $picture->created_at) ?></span>
    </div>
</div>
