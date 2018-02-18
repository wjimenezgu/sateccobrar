<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Dia".
 *
 * @property integer $id
 * @property string $nombreDia
 * @property string $letra
 *
 * @property CliProTramPagCob[] $cliProTramPagCobs
 */
class Dia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Dia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreDia', 'letra'], 'required'],
            [['nombreDia'], 'string', 'max' => 25],
            [['letra'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombreDia' => 'Nombre Dia',
            'letra' => 'Letra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliProTramPagCobs()
    {
        return $this->hasMany(CliProTramPagCob::className(), ['idDia' => 'id']);
    }
}
