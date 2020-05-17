<?php

namespace frontend\controllers;

use frontend\models\Album;
use frontend\models\Picture;
use Yii;
use yii\debug\models\search\Db;
use yii\web\Controller;
use frontend\modules\user\models\forms\PictureForm;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];

    }

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionGallery()
    {
        $currentUser = Yii::$app->user->identity;
        $albums = Album::find()->where(['creator' => $currentUser])->all();

        return $this->render('gallery', [
            'albums' => $albums,
        ]);
    }


}
