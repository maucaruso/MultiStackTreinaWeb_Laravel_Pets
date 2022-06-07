<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetRequest;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Retorna a lista de pets cadastrados
     *
     * @return Collection
     */
    public function index()
    {
        return Pet::get();
    }

    /**
     * Cria um Pet no banco de dados
     *
     * @param PetRequest $request
     * @return Pet
     */
    public function store(PetRequest $request)
    {
        $dadosPet = $request->all();

        return Pet::create($dadosPet);
    }
}
