<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "EntidadTelefono".
 *
 * @property integer $id
 * @property integer $idEntidad
 * @property integer $idTipoTelefono
 * @property string $numero
 * @property string $observacion
 *
 * @property Entidad $idEntidad0
 * @property TipoTelefono $idTipoTelefono0
 */
class Entidadtelefono extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EntidadTelefono';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTipoTelefono', 'numero'], 'required'],
            [['idEntidad', 'idTipoTelefono'], 'integer'],
            [['numero'], 'string', 'max' => 25],
            [['observacion'], 'string', 'max' => 100]
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
            'idTipoTelefono' => 'Tipo Teléfono',
            'numero' => 'Número',
            'observacion' => 'Observación',
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
    public function getIdTipoTelefono0()
    {
        return $this->hasOne(TipoTelefono::className(), ['id' => 'idTipoTelefono']);
    }
}
