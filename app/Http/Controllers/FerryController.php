<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf; 

use Illuminate\Http\Request;
use App\Models\Ferry;
use App\Models\Equipement;

class FerryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        // On récupère tous les ferrys depuis la base de données
    $ferries = Ferry::all(); 

    // On retourne la vue du dashboard en lui passant la liste des ferrys
    return view('dashboard', compact('ferries'));
    }

    /**
     * Show the form for creating a new resource.
     */
  public function create()
{
    // On récupère tous les équipements pour les afficher en cases à cocher
    $equipements = Equipement::all();

    return view('create', compact('equipements'));
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    // 1. Validation des données (on ajoute la photo )
    $request->validate([
        'nom' => 'required',
        'longueur' => 'required|numeric',
        'largeur' => 'required|numeric',
        'vitesse' => 'required|integer',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // 2. Préparation des données pour la création
    $data = $request->except('equipements', 'photo');

    // 3. Gestion de l'image
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        // On crée un nom unique : ex 170445123.jpg
        $filename = time() . '.' . $file->getClientOriginalExtension();
        // On déplace le fichier dans public/images/ferries
        $file->move(public_path('images/ferries'), $filename);
        // On ajoute le nom du fichier dans les données à enregistrer
        $data['photo'] = $filename;
    }

    // 4. Création du ferry avec les données propres
    $ferry = Ferry::create($data);

    // 5. Liaison avec les équipements
    if ($request->has('equipements')) {
        $ferry->equipements()->attach($request->equipements);
    }

    return redirect()->route('ferries.index')->with('success', 'Ferry ajouté avec succès !');
}

    /**
     * Display the specified resource.
     */
public function show($id) 
{
    // On récupère le ferry avec ses équipements liés (grâce au Eager Loading 'with')
    $ferry = Ferry::with('equipements')->findOrFail($id);
    
    // On retourne la vue show.blade.php
    return view('show', compact('ferry'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    $ferry = Ferry::findOrFail($id);
    $ferry->delete(); // Supprime le ferry (et les liaisons si cascade est configurée  ( equipement_ferry))

    return redirect()->route('ferries.index')->with('success', 'Ferry supprimé !');
}

public function generateAllPDF()
{
    // On récupère tous les ferries avec leurs équipements
    $ferries = Ferry::with('equipements')->get();

    // On génère la vue
    $pdf = Pdf::loadView('pdf_all_ferries', compact('ferries'));

    // On télécharge le fichier
    return $pdf->download('inventaire-flotte-complet.pdf');
}

}
