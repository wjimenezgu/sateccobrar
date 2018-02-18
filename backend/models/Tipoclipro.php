<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "TipoCliPro".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property CliProCia[] $cliProCias
 */
class Tipoclipro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TipoCliPro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'descripcion'], 'required'],
            [['id'], 'integer'],
            [['descripcion'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliProCias()
    {
        return $this->hasMany(CliProCia::className(), ['idTipoCliPro' => 'id']);
    }
}
