<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "EntidadContacto".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $idEntidad
 * @property integer $idPuesto
 * @property string $correoE
 *
 * @property Entidad $idEntidad0
 * @property Puesto $idPuesto0
 * @property EntidadContactoTelefono[] $entidadContactoTelefonos
 */
class Entidadcontacto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EntidadContacto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'idPuesto'], 'required'],
            [['idEntidad', 'idPuesto'], 'integer'],
            [['nombre', 'correoE'], 'string', 'max' => 100]
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
            'idEntidad' => 'Id Entidad',
            'idPuesto' => 'Puesto',
            'correoE' => 'Correo Electrónico',
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
    public function getIdPuesto0()
    {
        return $this->hasOne(Puesto::className(), ['id' => 'idPuesto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntidadContactoTelefonos()
    {
        return $this->hasMany(Entidadcontactotelefono::className(), ['idEntidadContacto' => 'id']);
    }
}
