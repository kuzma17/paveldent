<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property integer $post_id
 * @property string $author
 * @property string $email
 * @property string $url
 * @property string $content
 * @property integer $status
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author', 'email', 'content'], 'required', 'message'=>'поле необходимое для заполнения'],
            [['post_id', 'status'], 'integer'],
            [['email'], 'email', 'message'=>'не верный email адрес'],
            [['content'], 'string'],
            [['author', 'url'], 'string', 'max' => 255, 'message'=>'максимальное количество знаков: 255']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'author' => 'Author',
            'email' => 'Email',
            'url' => 'Url',
            'content' => 'Content',
            'status' => 'Status',
            'created_at' => 'Created At'
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }
}
