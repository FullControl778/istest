<?php

namespace frontend\modules\picture\controllers;

use frontend\models\Album;
use Yii;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use frontend\components\Storage;
use frontend\models\Picture;

use frontend\modules\picture\models\forms\PictureForm;

/**
 * Default controller for the `picture` module
 */
class DefaultController extends Controller
{
    public function actionView($id)
    {
        $picture = Picture::find()->where(['id' => $id])->one();

        return $this->render('view', [
            'id' => $id,
            'picture'=>$picture,
        ]);
    }

    /**
     * Renders the create view for the module
     * @return string
     */
    public function actionDownload()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/user/default/login']);
        }

        $model = new PictureForm();

        $currentUser = Yii::$app->user->identity;
        $currUserAlbums = \frontend\models\Album::find()->where(['creator' => $currentUser])->all();
        $items = ArrayHelper::map($currUserAlbums, 'name', 'name');

        if ($model->load(Yii::$app->request->post())) {

            $model->picture = UploadedFile::getInstance($model, 'picture');

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Picture download!');
            }
        }

        return $this->render('download', [
            'model' => $model,
            'items' => $items,
        ]);
    }

    public function actionDelete($id = false)
    {
        if (isset($id)) {
        $picture = Picture::findOne(['id' => $id]);
            if (Picture::deleteAll(['in', 'id', $id])) {
                Yii::$app->storage->deleteFile($picture->filename);

                $this->redirect(['/album/default/view', 'name' => $picture->album]);
            }
        } else {
            $this->redirect(['index']);
        }
    }

}
