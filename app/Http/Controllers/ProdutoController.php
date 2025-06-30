<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // Exibe todos os produtos ordenados por nome
    public function index()
    {
        $produtos = Produto::orderBy('nome')->get();
        return view('produtos.index', compact('produtos'));
    }

    // Armazena um novo produto após validação e atribuição da raridade
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:500',
            'ano_fabricacao' => 'nullable|integer|min:1900|max:' . date('Y'),
            'modelo' => 'nullable|string|max:255',
            'empresa' => 'nullable|string|max:255',
            'preco' => 'nullable|numeric|min:0',
        ]);

        $dados = $request->only([
            'nome', 'descricao', 'ano_fabricacao', 'modelo', 'empresa', 'preco'
        ]);

        $dados['raridade'] = $this->gerarRaridadeAleatoria();

        Produto::create($dados);

        return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
    }

    // Método privado que define a raridade aleatória de um produto
    private function gerarRaridadeAleatoria()
    {
        $ranks = ['Comum', 'Incomum', 'Raro', 'Lendário'];
        return $ranks[array_rand($ranks)];
    }

    // Deleta um produto após verificar se ele existe
    public function destroy($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return redirect()->back()->with('error', 'Produto não encontrado.');
        }

        $produto->delete();

        return redirect()->back()->with('success', 'Produto excluído com sucesso!');
    }

    public function edit($id)
{
    $produto = Produto::findOrFail($id);
    return view('produtos.edit', compact('produto'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'descricao' => 'nullable|string|max:500',
        'ano_fabricacao' => 'nullable|integer|min:1900|max:' . date('Y'),
        'modelo' => 'nullable|string|max:255',
        'empresa' => 'nullable|string|max:255',
        'preco' => 'nullable|numeric|min:0',
    ]);

    $produto = Produto::findOrFail($id);
    $produto->update($request->only([
        'nome', 'descricao', 'ano_fabricacao', 'modelo', 'empresa', 'preco'
    ]));

    return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
}
}

