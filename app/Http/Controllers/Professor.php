<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;

class ProfessorController extends Controller
{

    public function index()
    {
        $professors = Professor::all();

        return view('professores',['professors' => $professors]);
    }


    public function insereProfessor(Request $request)
    {

        $novo_professor = new Professor;

        $novo_professor->credencial = $request->credencial;
        $novo_professor->nome = $request->nome;
        $novo_professor->disciplina = $request->disciplina;
        $novo_professor->quantidade_turmas = $request->quantidade_turmas;
        $novo_professor->total_alunos = $request->total_alunos;
        $novo_professor->aprovados = $request->aprovados;
        $novo_professor->horas_aula = $request->horas_aula;
        $novo_professor->salario = $request->salario;
        $novo_professor->email = $request->email;

        $novo_professor->save();

        return back();
    }

    public function atualizaProfessor(Request $request, $id)
    {
        $professor = Professor::find($id);

        $professor->nome = $request->nome;
        $professor->disciplina = $request->disciplina;
        $professor->quantidade_turmas = $request->quantidade_turmas;
        $professor->total_alunos = $request->total_alunos;
        $professor->aprovados = $request->aprovados;
        $professor->horas_aula = $request->horas_aula;
        $professor->salario = $request->salario;
        $professor->email = $request->email;

        $professor->save();

        return back();
    }


    public function deletaProfessor($id)
    {
        // $professor = Professor::find($id);
        // $professor->delete();

        Professor::destroy($id);

        return back();
    }
}
