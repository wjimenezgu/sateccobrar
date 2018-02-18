<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "TipoSistema".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property CliPro[] $cliPros
 */
class Tiposistema extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TipoSistema';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
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
    public function getCliPros()
    {
        return $this->hasMany(CliPro::className(), ['idTipoSistema' => 'id']);
    }
}
