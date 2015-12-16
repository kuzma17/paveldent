<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "price_section".
 *
 * @property integer $id
 * @property string $name
 * @property integer $num
 * @property integer $on
 */
class PriceSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price_section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'num'], 'required'],
            [['num', 'on'], 'integer'],
            [['name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'num' => 'Num',
            'on' => 'On',
        ];
    }
}
