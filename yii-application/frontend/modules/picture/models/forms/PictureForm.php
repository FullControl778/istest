<?php

namespace frontend\modules\picture\models\forms;

use Yii;
use yii\base\Model;
use frontend\models\Picture;
use frontend\models\User;
use yii\helpers\StringHelper;

//use Intervention\Image\ImageManager;

class PictureForm extends Model
{

    public $picture;
    public $album;
    public $user;

    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['picture'], 'file',
                'skipOnEmpty' => false,
                'extensions' => ['jpg', 'png'],
                'checkExtensionByMimeType' => true,
                'maxSize' => $this->getMaxFileSize()],
            [['album'], 'string',],
            [['user'], 'string',]
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $picture = new Picture();
            $picture->album = $this->album;
            $picture->filename = Yii::$app->storage->saveUploadedFile($this->picture);
            $picture->user = Yii::$app->user->identity->username;
            $picture->created_at = time();
            return ($picture->save(false));
        }
        return false;
    }


    /**
     * Maximum size of the uploaded file
     * @return integer
     */
    private
    function getMaxFileSize()
    {
        return Yii::$app->params['maxFileSize'];
    }

}

