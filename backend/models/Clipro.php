<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "CliPro".
 *
 * @property integer $id
 * @property integer $idEntidad
 * @property integer $idTipoSistema
 * @property integer $plazoPagCob
 *
 * @property Entidad $idEntidad0
 * @property TipoSistema $idTipoSistema0
 * @property CliProCia[] $cliProCias
 * @property CliProCuenta[] $cliProCuentas
 * @property CliProTramPagCob[] $cliProTramPagCobs
 */
class Clipro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CliPro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEntidad', 'idTipoSistema','plazoPagCob'], 'required'],
            [['idEntidad', 'idTipoSistema', 'plazoPagCob'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idEntidad' => 'Entidad',
            'idTipoSistema' => 'Sistema',
            'plazoPagCob' => 'Plazo Crédito (días)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEntidad0()
    {
        return $this->hasOne(Entidad::className(), ['id' => 'idEntidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoSistema0()
    {
        return $this->hasOne(Tiposistema::className(), ['id' => 'idTipoSistema']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliProCias()
    {
        return $this->hasMany(Cliprocia::className(), ['idCliPro' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliProCuentas()
    {
        return $this->hasMany(Cliprocuenta::className(), ['idCliPro' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliProTramPagCobs()
    {
        return $this->hasMany(Cliprotrampagcob::className(), ['idCliPro' => 'id']);
    }
    
    /* Funcion adicional para traer el nombre del cliente */
    public function getCliProNombre() {
    	return $this->idEntidad0->nombre;
    }
}
