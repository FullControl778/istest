<?php

namespace frontend\modules\album\models\forms;

use frontend\models\User;
use Yii;
use yii\base\Model;
use frontend\models\Album;
use yii\helpers\ArrayHelper;

class AlbumForm extends Model
{
    const MAX_ALBUMNAME_LENGHT = 20;

    public $name;
    public $creator;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => self::MAX_ALBUMNAME_LENGHT],
            ['creator', 'default', 'value' => Yii::$app->user->identity->username],
        ];
    }


    public function save()
    {

        $currentUser = Yii::$app->user->identity;

        if ($this->validate()) {
            $album = new Album();
            $album->name = $this->name;
            $album->creator = $this->creator;
            $album->created_at = time();

            //Проверка есть ли альбом с идентичным именем у данного пользователя
            if ($checkAlbums = \frontend\models\Album::find()->where(['creator' => $currentUser])->andWhere(['name' => $album->name])->one()) {
                Yii::$app->session->setFlash('danger', 'An album with the same name already exists. Please choose a different name');
                return false;
            }
            return ($album->save(false));
        }
        return false;
    }
}

