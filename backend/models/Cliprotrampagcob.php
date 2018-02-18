<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "CliProTramPagCob".
 *
 * @property integer $id
 * @property integer $idCliPro
 * @property integer $idDia
 * @property integer $idTramitePagCob
 * @property string $horaInicia
 * @property string $horaFin
 *
 * @property CliPro $idCliPro0
 * @property Dia $idDia0
 * @property TramitePagCob $idTramitePagCob0
 */
class Cliprotrampagcob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CliProTramPagCob';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDia', 'idTramitePagCob'], 'required'],
            [['idCliPro', 'idDia', 'idTramitePagCob'], 'integer'],
            [['horaInicia', 'horaFin'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCliPro' => 'Id Cli Pro',
            'idDia' => 'Día',
            'idTramitePagCob' => 'Trámite Facturas',
            'horaInicia' => 'Hora Inicia',
            'horaFin' => 'Hora Fin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliPro0()
    {
        return $this->hasOne(CliPro::className(), ['id' => 'idCliPro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDia0()
    {
        return $this->hasOne(Dia::className(), ['id' => 'idDia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTramitePagCob0()
    {
        return $this->hasOne(TramitePagCob::className(), ['id' => 'idTramitePagCob']);
    }
}
