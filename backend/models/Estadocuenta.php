<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "CliProCia".
 *
 * @property integer $id
 * @property integer $idCliPro
 * @property integer $idCompania
 * @property string $nombre
 * @property integer $plazoPagCob
 * @property string $limitePagCob
 * @property integer $idTipoCliPro
 * @property integer $idEstadoCliPro
 * @property string $obsEstadoCliPro
 * @property string $fecModEstadoCliPro
 *
 * @property EstadoCliPro $idEstadoCliPro0
 * @property CliPro $idCliPro0
 * @property Compania $idCompania0
 * @property TipoCliPro $idTipoCliPro0
 * @property Documento[] $documentos
 */
class Estadocuenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CliProCia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCliPro', 'idCompania', 'nombre', 'plazoPagCob', 'idTipoCliPro', 'idEstadoCliPro'], 'required'],
            [['idCliPro', 'idCompania', 'plazoPagCob', 'idTipoCliPro', 'idEstadoCliPro'], 'integer'],
            [['limitePagCob'], 'number'],
            [['fecModEstadoCliPro'], 'safe'],
            [['nombre'], 'string', 'max' => 200],
            [['obsEstadoCliPro'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCliPro' => 'Codigo',
            'idCompania' => 'Id Compania',
            'nombre' => 'Nombre',
            'plazoPagCob' => 'Plazo',
            'limitePagCob' => 'Limite',
            'idTipoCliPro' => 'Tipo',
            'idEstadoCliPro' => 'Estado',
            'obsEstadoCliPro' => 'Observacion Estado',
            'fecModEstadoCliPro' => 'Fec Mod Estado Cli Pro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstadoCliPro0()
    {
        return $this->hasOne(Estadoclipro::className(), ['id' => 'idEstadoCliPro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliPro0()
    {
        return $this->hasOne(Clipro::className(), ['id' => 'idCliPro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCompania0()
    {
        return $this->hasOne(Compania::className(), ['id' => 'idCompania']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoCliPro0()
    {
        return $this->hasOne(Tipoclipro::className(), ['id' => 'idTipoCliPro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentos()
    {
        return $this->hasMany(Documento::className(), ['idCliProCia' => 'id']);
    }
}
