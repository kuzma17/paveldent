<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sertificate".
 *
 * @property integer $id
 * @property string $image
 * @property string $image_s
 * @property integer $on
 */
class Sertificate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sertificate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        //return [
         //   [['image', 'image_s', 'on'], 'required'],
          //  [['on'], 'integer'],
          //  [['image', 'image_s'], 'string', 'max' => 100]
        //];
        return [
            [['image'], 'required'],
            [['image'], 'image', 'extensions' => 'png, jpg, gif'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'image_s' => 'Image S',
            'on' => 'On',
        ];
    }
}
