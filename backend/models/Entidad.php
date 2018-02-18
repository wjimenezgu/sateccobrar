<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Entidad".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $idTipoEntidad
 * @property string $direccion
 * @property string $cedula
 * @property string $apartado
 * @property string $observacion
 * @property string $fecIns
 * @property string $userIns
 *
 * @property CliPro[] $cliPros
 * @property TipoEntidad $idTipoEntidad0
 * @property EntidadContacto[] $entidadContactos
 * @property EntidadTelefono[] $entidadTelefonos
 */
class Entidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Entidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'idTipoEntidad'], 'required'],
            [['idTipoEntidad'], 'integer'],
            [['fecIns'], 'safe'],
            [['nombre'], 'string', 'max' => 200],
            [['direccion'], 'string', 'max' => 500],
            [['cedula', 'apartado'], 'string', 'max' => 25],
            [['observacion'], 'string', 'max' => 100],
            [['userIns'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'idTipoEntidad' => 'Tipo Entidad',
            'direccion' => 'Dirección',
            'cedula' => 'Cédula',
            'apartado' => 'Apartado',
            'observacion' => 'Observación',
            'fecIns' => 'Fec Ins',
            'userIns' => 'User Ins',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliPros()
    {
        return $this->hasMany(Clipro::className(), ['idEntidad' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoEntidad0()
    {
        return $this->hasOne(Tipoentidad::className(), ['id' => 'idTipoEntidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntidadContactos()
    {
        return $this->hasMany(Entidadcontacto::className(), ['idEntidad' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntidadTelefonos()
    {
        return $this->hasMany(Entidadtelefono::className(), ['idEntidad' => 'id']);
    }
}
