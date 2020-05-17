<?php

/* @var  $pageTitle string */

?>

<div class="header">
    <h1 class="header__title" ><?php echo $pageTitle ?></h1>
    <?php echo \yii\helpers\Html::a('Back', Yii::$app->request->referrer, ['class' => 'btn btn__back']) ?>
</div>

