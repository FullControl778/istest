<?php

namespace frontend\modules\album\controllers;

use frontend\models\Album;
use frontend\models\Picture;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use frontend\modules\album\models\forms\AlbumForm;

//use frontend\components\Storage;

/**
 * Default controller for the `album` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the create view for the module
     * @return string
     */
    public function actionView($name)
    {

        $currentUser = Yii::$app->user->identity;
        $pictures = Picture::find()->where(['user' => $currentUser->username])->andWhere(['album' => $name])->all();

        return $this->render('view', [
            'name' => $name,
            'currentUser' => $currentUser,
            'pictures' => $pictures
        ]);
    }

    /**
     * Renders the create view for the module
     * @return string
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/user/default/login']);
        }

        $model = new AlbumForm();

        $currentUser = Yii::$app->user->identity;

        if ($checkAlbums = \frontend\models\Album::find()->where(['creator' => $currentUser])->andWhere(['name' => $model->name])->one()) {
            Yii::$app->session->setFlash('info', 'An album with the same name already exists. Please choose a different name');
            return false;
        }

        if ($model->load(Yii::$app->request->post())) {

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Album created!');
            }
        }

        return $this->render('create', [
            'model' => $model,
            'currentUser' => $currentUser,
        ]);
    }


    public function actionDelete($name = false, $pictures = false)
    {
        $currentUser = Yii::$app->user->identity;
        $pictures = Picture::find()->where(['user' => $currentUser->username])->andWhere(['album' => $name])->all();
        $album = Album::findOne(['name' => $name, 'creator' => $currentUser]);

        if (Album::deleteAll(['in', 'id', $album->id])) {
            foreach ($pictures as $picture) {
                $id = $picture->id;
                if (isset($id)) {
                    if (Picture::deleteAll(['in', 'id', $id])) {
                        Yii::$app->storage->deleteFile($picture->filename);
                    }
                }

                Yii::$app->storage->deleteFile($picture->filename);
                $this->redirect(['/site/gallery']);
            }
        } else {
            $this->redirect(['/site/gallery']);
        }
    }

}


