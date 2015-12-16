<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "text".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $num
 * @property integer $on
 */
class Text extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'text';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'num'], 'required'],
            [['text'], 'string'],
            [['num', 'on'], 'integer'],
            [['title'], 'string', 'max' => 200]
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
            'text' => 'Text',
            'num' => 'Num',
            'on' => 'On',
        ];
    }
}
