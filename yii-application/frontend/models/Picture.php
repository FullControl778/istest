<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pictures".
 *
 * @property int $id
 * @property string $album
 * @property string $filename
 * @property string $user
 * @property int $created_at
 */
class Picture extends \yii\db\ActiveRecord
{
//    /**
//     * {@inheritdoc}
//     */
    public static function tableName()
    {
        return 'picture';
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'album' => 'album',
            'filename' => 'Filename',
            'user' => 'User',
            'created_at' => 'Created At',
        ];
    }

    public function previewAlbum($album) {
        $currentUser = Yii::$app->user->identity;
        return $preview = Picture::find()->where(['user'=>$currentUser])->andWhere((['album'=>$album]))->orderBy('id DESC')->limit(4)->all();
    }



    public function getImage()
    {
        return Yii::$app->storage->getFile($this->filename);
    }

}
