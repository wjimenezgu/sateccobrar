<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "EstadoCliPro".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property CliProCia[] $cliProCias
 */
class Estadoclipro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EstadoCliPro';
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
        return $this->hasMany(CliProCia::className(), ['idEstadoCliPro' => 'id']);
    }
}
