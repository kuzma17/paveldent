<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "price".
 *
 * @property integer $id
 * @property integer $section_id
 * @property string $num_name
 * @property string $name
 * @property string $price_usd
 * @property string $price_grn
 * @property integer $on
 */
class Price extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section_id', 'num_name', 'name', 'price_usd', 'price_grn'], 'required'],
            [['section_id', 'on'], 'integer'],
            [['num_name'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 200],
            [['price_usd', 'price_grn'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section_id' => 'Section ID',
            'num_name' => 'Num Name',
            'name' => 'Name',
            'price_usd' => 'Price Usd',
            'price_grn' => 'Price Grn',
            'on' => 'On',
        ];
    }
}
