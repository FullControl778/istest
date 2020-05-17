<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Albums".
 *
 * @property int $id
 * @property string $name
 * @property string $creator
 * @property int $created_at
 */
class Album extends \yii\db\ActiveRecord
{
//    /**
//     * {@inheritdoc}
//     */
    public static function tableName()
    {
        return 'album';
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'creator' => 'Creator',
            'created_at' => 'Created At',
        ];
    }
}
