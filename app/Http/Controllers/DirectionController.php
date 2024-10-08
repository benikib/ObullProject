<?php

namespace App\Http\Controllers;

use App\Models\Branche;
use App\Models\Classe;
use App\Models\Cour;
use App\Models\Direction;
use App\Models\Eleve;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::all()->count();

        return view('admin.dashboard',compact('options'));
    }
    public function options()
    {
        $options = Option::all();

        return view('admin.option.index',compact('options'));
    }
    public function option_store(Request $request)
    {

        $direction_id = Auth::user()->id;

        // Valider les données entrantes (si nécessaire, par exemple pour un formulaire)
        $validatedData = $request->validate([
            'intitule' => 'required|string|max:255',  // Exemple de validation
            // Ajoutez ici d'autres champs selon vos besoins
        ]);

        // Créer une nouvelle option
        $option = new Option();
        $option->intitule = $validatedData['intitule'];  // Assurez-vous que 'nom_option' correspond au champ dans votre formulaire
        $option->direction_id = $direction_id;  // Associez l'option à l'utilisateur connecté
        $option->save();

        // Récupérer toutes les options à afficher dans la vue
        $options = Option::all();

        // Retourner la vue avec les options
        return view('admin.option.index', compact('options'));
    }
    public function option_update(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|integer|exists:options,id',
        'intitule' => 'required|string|max:255',
    ]);


    $user = Option::find($validatedData['id']);
    $user->intitule = $validatedData['intitule'];
    $user->save();

    return  redirect()->back()->with('success', 'update avec success');
}
public function option_destroy(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|integer|exists:options,id',
    ]);

    $user = Option::find($validatedData['id']);
    $user->delete();

     return  redirect()->back()->with('succes ', 'mise à jour avec success');
}

public function classe()
{


    $options = Option::all();
    $classes = DB::table('classes')
    ->join('options', 'classes.option_id', '=', 'options.id') // Correction des alias
    ->select('classes.*', 'options.intitule as option' , 'options.id as option_id') // Sélection des colonnes souhaitées
    ->get();





    return view('admin.classe.index',compact('options','classes'));
}
public function classe_store(Request $request)
{

    $direction_id = Auth::user()->id;

    // Valider les données entrantes (si nécessaire, par exemple pour un formulaire)
    $validatedData = $request->validate([
        'intitule' => 'required|string|max:255',
        'option_id' => 'required|integer|exists:options,id',  // Exemple de validation
        // Ajoutez ici d'autres champs selon vos besoins
    ]);

    // Créer une nouvelle option
    $option = new Classe();
    $option->intitule = $validatedData['intitule'];  // Assurez-vous que 'nom_option' correspond au champ dans votre formulaire
    $option->direction_id = $direction_id;
    $option->option_id = $validatedData['option_id'];  // Associez l'option à l'utilisateur connecté
    $option->save();

    // Récupérer toutes les options à afficher dans la vue
    $options = Option::all();

    // Retourner la vue avec les options
    return  redirect()->back()->with('succes ', 'mise à jour avec success');
}
public function classe_update(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|integer|exists:classes,id',
        'option_id' => 'required|integer|exists:options,id',
        'intitule' => 'required|string|max:255',
    ]);


        $user = Classe::find($validatedData['id']);
        $user->intitule = $validatedData['intitule'];
        $user->option_id = $validatedData['option_id'];
        $user->save();







    return  redirect()->back()->with('success', 'update avec success');
}
public function classe_destroy(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|integer|exists:classes,id',
    ]);

    $user = Classe::find($validatedData['id']);
    $user->delete();

     return  redirect()->back()->with('succes ', 'mise à jour avec success');
}

public function branch(){
    $branchs = Branche::all();

    return view('admin.branch.index',compact('branchs'));
}
public function branch_store(Request $request)
{

    $direction_id = Auth::user()->id;

    // Valider les données entrantes (si nécessaire, par exemple pour un formulaire)
    $validatedData = $request->validate([
        'intitule' => 'required|string|max:255',
          // Exemple de validation
        // Ajoutez ici d'autres champs selon vos besoins
    ]);

    // Créer une nouvelle option
    $branch = new Branche();
    $branch->intitule = $validatedData['intitule'];  // Assurez-vous que 'nom_option' correspond au champ dans votre formulaire
     // Associez l'option à l'utilisateur connecté
    $branch->save();

    // Récupérer toutes les options à afficher dans la vue
    $branch = Option::all();

    // Retourner la vue avec les options
    return  redirect()->back()->with('succes ', 'mise à jour avec success');
}
public function branch_update(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|integer|exists:branches,id',
        'intitule' => 'required|string|max:255',
    ]);


    $branch = Branche::find($validatedData['id']);
    $branch->intitule = $validatedData['intitule'];
    $branch->save();

    return  redirect()->back()->with('success', 'update avec success');
}
public function branch_destroy(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|integer|exists:classes,id',
    ]);

    $branch = Branche::find($validatedData['id']);
    $branch->delete();

     return  redirect()->back()->with('succes ', 'mise à jour avec success');
}



public function cours(){
    $branchs = Branche::all();
    $cours = DB::table('cours')
    ->join('branches', 'cours.branch_id', '=', 'branches.id') // Correction des alias
    ->select('cours.*', 'branches.intitule as option' , 'branches.id as branch_id') // Sélection des colonnes souhaitées
    ->get();
    return view('admin.cours.index',compact('cours','branchs'));
}
public function cours_store(Request $request)
{

    $direction_id = Auth::user()->id;

    // Valider les données entrantes (si nécessaire, par exemple pour un formulaire)
    $validatedData = $request->validate([
        'intitule' => 'required|string|max:255',
        'branch_id' => 'required|integer|exists:branches,id',  // Exemple de validation
        // Ajoutez ici d'autres champs selon vos besoins
    ]);

    // Créer une nouvelle option
    $cours = new Cour();
    $cours->intitule = $validatedData['intitule'];  // Assurez-vous que 'nom_option' correspond au champ dans votre formulaire
    $cours->branch_id = $validatedData['branch_id'];  // Associez l'option à l'utilisateur connecté
    $cours->save();

    // Récupérer toutes les options à afficher dans la vue


    // Retourner la vue avec les options
    return  redirect()->back()->with('succes ', 'mise à jour avec success');
}

public function cours_update(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|integer|exists:branches,id',
        'branch_id' => 'required|integer|exists:branches,id',
        'intitule' => 'required|string|max:255',
    ]);


    $cours = Cour::find($validatedData['id']);
    $cours->intitule = $validatedData['intitule'];
    $cours->branch_id = $validatedData['branch_id'];
    $cours->save();

    return  redirect()->back()->with('success', 'update avec success');
}
public function cours_destroy(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|integer|exists:cours,id',
    ]);

    $cours = Cour::find($validatedData['id']);
    $cours->delete();

     return  redirect()->back()->with('succes ', 'mise à jour avec success');
}
public function eleves(){
    $eleves = Eleve::all();
    $cours = DB::table('cours')
    ->join('branches', 'cours.branch_id', '=', 'branches.id') // Correction des alias
    ->select('cours.*', 'branches.intitule as option' , 'branches.id as branch_id') // Sélection des colonnes souhaitées
    ->get();
    return view('admin.eleves.index',compact('eleves',));
}
public function eleves_store(Request $request)
{

    $direction_id = Auth::user()->id;

    // Valider les données entrantes (si nécessaire, par exemple pour un formulaire)
    $validatedData = $request->validate([
        'nom' => 'required|string|max:25',
        'prenom' => 'required|string|max:25',
        'postnom' => 'required|string|max:25',
        'sexe' => 'required|string|max:2',
       // 'branch_id' => 'required|integer|exists:branches,id',  // Exemple de validation
        // Ajoutez ici d'autres champs selon vos besoins
    ]);

    // Créer une nouvelle option
    $eleve = new Eleve();
    $eleve->nom = $validatedData['nom'];
    $eleve->prenom = $validatedData['prenom'];
    $eleve->postnom = $validatedData['postnom'];
    $eleve->sexe = $validatedData['sexe'];
    $eleve->direction_id = $direction_id;
    //$eleve->branch_id = $validatedData['branch_id']; 
    $eleve->save();

    // Récupérer toutes les options à afficher dans la vue


    // Retourner la vue avec les options
    return  redirect()->back()->with('succes ', 'mise à jour avec success');
}

public function eleves_update(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|integer|exists:branches,id',
        //'branch_id' => 'required|integer|exists:branches,id',
        'nom' => 'required|string|max:25',
        'prenom' => 'required|string|max:25',
        'postnom' => 'required|string|max:25',
        'sexe' => 'required|string|max:2',
    ]);


    $eleve = Eleve::find($validatedData['id']);
    $eleve->nom = $validatedData['nom'];
    $eleve->prenom = $validatedData['prenom'];
    $eleve->postnom = $validatedData['postnom'];
    $eleve->sexe = $validatedData['sexe'];
    $eleve->save();

    return  redirect()->back()->with('success', 'update avec success');
}
public function eleves_destroy(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|integer|exists:eleves,id',
    ]);

    $eleve = Eleve::find($validatedData['id']);
    $eleve->delete();

     return  redirect()->back()->with('succes ', 'mise à jour avec success');
}


    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Direction $direction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Direction $direction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Direction $direction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Direction $direction)
    {
        //
    }
}
