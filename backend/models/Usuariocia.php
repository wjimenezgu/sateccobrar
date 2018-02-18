<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "UsuarioCia".
 *
 * @property integer $nivelAcceso
 * @property integer $idCompania
 * @property integer $iduser
 *
 * @property Compania $idCompania0
 * @property User $iduser0
 */
class Usuariocia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'UsuarioCia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNivelAcceso', 'idCompania', 'iduser'], 'required'],
            [['idNivelAcceso', 'idCompania', 'iduser'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNivelAcceso' => 'Nivel Acceso',
            'idCompania' => 'Id Compania',
            'iduser' => 'Iduser',
        ];
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
    public function getIduser0()
    {
        return $this->hasOne(User::className(), ['id' => 'iduser']);
    }
}
