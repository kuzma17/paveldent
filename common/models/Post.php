<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $anons
 * @property string $context
 * @property integer $category_id
 * @property integer $author_id
 * @property integer $status
 * @property string $created_at
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'anons', 'context', 'category_id', 'author_id'], 'required'],
            [['anons', 'context'], 'string'],
            [['category_id', 'author_id', 'status'], 'integer'],
            //[['created_at'], 'safe'],
            [['title'], 'string', 'max' => 255]
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
            'anons' => 'Анонс',
            'context' => 'Текст',
            'category_id' => 'Категория',
            'author_id' => 'Автор',
            'status' => 'Status',
            'created_at' => 'Created At',

        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getAuthor(){
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }
}
