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
 *
 * @property CliPro $idCliPro0
 * @property Compania $idCompania0
 * @property Documento[] $documentos
 * @property Maestro[] $maestros
 */
class Cliprocia extends \yii\db\ActiveRecord
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
            [['idCliPro', 'idCompania'], 'required'],
            [['idCliPro', 'idCompania', 'plazoPagCob'], 'integer'],
            [['nombre'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCliPro' => 'Cliente',
            'idCompania' => 'Compañía',
            'nombre' => 'Cliente',
            'plazoPagCob' => 'Plazo Crédito (días)',
        ];
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
    public function getDocumentos()
    {
        return $this->hasMany(Documento::className(), ['idCliProCia' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaestros()
    {
        return $this->hasMany(Maestro::className(), ['idCliente' => 'id']);
    }
    
    
    
    /* Funciona Adicional para traer el nombre del cliente */
    public function getCliProCiaNombre() {
    	return $this->idCliPro0->cliProNombre;
    }
    
    /* Funciona Adicional para traer el idEntidad del Cliente */
    public function getCliProCiaEntidad() {
    	return   $this->idCliPro0->idEntidad.' '.$this->nombre;
    }
    
}
