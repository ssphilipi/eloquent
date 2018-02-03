<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use softDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    //-----------------------------------------------------------------
    //exemplo de função
    public function exemplo($id){

        $exemplo = Aluno::find($id);
        return $exemplo;
    }



    public static function exercicio4($data){
      $aluno_novo = new Aluno;
      $aluno_novo->nome = $data->nome;
      $aluno_novo->registro = $data->registro;
      $aluno_novo->serie = $data->serie;
      $aluno_novo->turma = $data->turma;
      $aluno_novo->faltas = $data->faltas;
      $aluno_novo->media = $data->media;

      $aluno_novo->save();

    }

    public static function exercicio5(Aluno $aluno){
      Aluno::where('media','>',6.9)->update(['status'=>'aprovado']);
      Aluno::where('media','<',5)->update(['status'=>'reprovado']);
      Aluno::where('media','<',6.9)->where('media','>',5)->update(['status'=>'recuperação']);
    }

}
