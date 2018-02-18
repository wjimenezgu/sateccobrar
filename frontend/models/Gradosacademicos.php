<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "GradosAcademicos".
 *
 * @property integer $idInstitucion
 * @property integer $idGrado
 * @property string $nombreGrado
 * @property string $siglasGrado
 *
 * @property Instituciones $idInstitucion0
 */
class Gradosacademicos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'GradosAcademicos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInstitucion', 'nombreGrado'], 'required'],
            [['idInstitucion'], 'integer'],
            [['nombreGrado'], 'string', 'max' => 100],
            [['siglasGrado'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idInstitucion' => 'Institución',
            'idGrado' => 'Grado',
            'nombreGrado' => 'Nombre',
            'siglasGrado' => 'Siglas',
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
