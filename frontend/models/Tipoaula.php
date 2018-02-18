<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TipoAula".
 *
 * @property integer $idTipoAula
 * @property string $descTipoAula
 * @property integer $idInstitucion
 *
 * @property Instituciones $idInstitucion0
 */
class Tipoaula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TipoAula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descTipoAula', 'idInstitucion'], 'required'],
            [['idInstitucion'], 'integer'],
            [['descTipoAula'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTipoAula' => 'Id Tipo Aula',
            'descTipoAula' => 'Descripción',
            'idInstitucion' => 'Institución',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInstitucion0()
    {
        return $this->hasOne(Instituciones::className(), ['id' => 'idInstitucion']);
    }
}
