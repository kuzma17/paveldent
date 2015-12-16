<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $title
 * @property string $alt_title
 * @property string $text
 * @property string $url
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'alt_title', 'text', 'url'], 'required'],
            [['text'], 'string'],
            [['title', 'alt_title'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 30]
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
            'url' => 'Url',
        ];
    }
}
