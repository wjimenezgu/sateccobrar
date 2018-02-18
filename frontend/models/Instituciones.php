<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Instituciones".
 *
 * @property integer $id
 * @property string $nombreInstitucion
 * @property integer $idTipoInstitucion
 *
 * @property TipoInstitucion $idTipoInstitucion0
 */
class Instituciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Instituciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreInstitucion', 'idTipoInstitucion'], 'required'],
            [['idTipoInstitucion'], 'integer'],
            [['nombreInstitucion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombreInstitucion' => 'Nombre Institución',
            'idTipoInstitucion' => 'Tipo Institución',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoInstitucion0()
    {
        return $this->hasOne(Tipoinstitucion::className(), ['id' => 'idTipoInstitucion']);
    }
}
