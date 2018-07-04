<?php



namespace common\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "curso".
 *
 * @property int $id_curso
 * @property string $nome
 * @property string $sigla
 * @property string $descricao
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'sigla', 'descricao'], 'required', 'message' => 'Este campo é obrigatório'],
            [['descricao'], 'string'],
            [['nome'], 'string', 'max' => 45],
            [['sigla'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_curso' => 'Curso',
            'nome' => 'Nome',
            'sigla' => 'Sigla',
            'descricao' => 'Descrição',
            'quant' => 'Número de Alunos',
        ];
    }
    
    public function quant_alunos($id){
        return User::find()->where('id_curso='.$id)->count();
    }
    
    
}
