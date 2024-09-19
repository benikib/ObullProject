<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Direction;
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
