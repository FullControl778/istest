<?php

namespace backend\models;

use \yii\db\ActiveRecord;

class Gallery extends ActiveRecord
{


    public static function tableName()
    {
        $albums = gallery;
//        return '{{gallery}}';
        return $albums;
    }


    public static function primaryKey()
    {
        return ['id'];
    }


//    /**
//     * Define rules for validation
//     */
//    public function rules()
//    {
//        return [
//            [['id', 'title', 'creator'], 'required']
//        ];
//    }
}