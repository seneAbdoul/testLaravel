<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiliereFormRequest;
use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index(){
        return view('filiere.liste',[
            'filieres'=> Filiere::orderBy('created_at','desc')->paginate(4),
        ]);
    }
    public function create(){
        $filiere = new Filiere();
        return view('filiere.add',[
            'filiere'=> $filiere,
        ]);
         
    }

    public function store(FiliereFormRequest $request){
              $filiere = Filiere::create($request->validated());
              return redirect()->route('filiere.page.index')->with('success','objet ajouter avec success');
    }

        
    public function edit($id)
    {
        $filiere = Filiere::findOrFail($id);
        return view("filiere.add", [
            "filiere" => $filiere,
        ]);
    }

        public function update(FiliereFormRequest $request, $id){
            $filiere = Filiere::findOrFail($id);
            $filiere ->update($request->validated());
            return redirect()->route('filiere.page.index')->with('success','objet modifier avec success');
        }
        
        public function destroy(Filiere $filiere){
                $filiere->delete();
               return redirect()->route('filiere.page.index')->with('success','objet supprimer avec success');
        }

}
