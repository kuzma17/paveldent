<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property integer $id
 * @property string $title
 * @property string $alt_title
 * @property string $text
 * @property integer $num
 * @property integer $on
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'alt_title', 'text', 'num'], 'required'],
            [['text'], 'string'],
            [['num', 'on'], 'integer'],
            [['title', 'alt_title'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'alt_title' => 'Alt Title',
            'text' => 'Text',
            'num' => 'Num',
            'on' => 'On',
        ];
    }
}
