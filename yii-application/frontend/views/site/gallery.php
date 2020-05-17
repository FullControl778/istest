<?php


/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My gallery';
$this->params['breadcrumbs'][] = $this->title;

if (Yii::$app->user->isGuest) {
    return Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
}

?>


<div class="site-album">
    <h1><?= Html::encode($this->title) ?></h1>
</div>
<div class="body-content">
<div class="container-fluid">
<div class="albums-list">
    <?php foreach ($albums as $album): ?>
    <div class="album">
        <a href="<?php echo Url::to(['/album/default/view', 'name' => $album->name]) ?>">
            <div class="album__preview">
            <?php foreach (\frontend\models\Picture::previewAlbum($album) as $picture): ?>
                <img src="/uploads/<?php echo $picture->filename ?>" alt="" class="album__preview-img">
            <?php endforeach; ?>
            </div>
            <span class="album__name"><?php echo $album->name ?></span>
        </a>
    </div>
    <?php endforeach; ?>
</div>
</div>
</div>