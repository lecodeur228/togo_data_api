<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function getAllPaces(){
        $places = Place::get();

        return response()->json(["places" => $places,"status" => "SUCCESS"]);

    }

    public function searchPlaces(Request $request)
    {
        // Définir les règles de validation
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|min:1',
        ]);
    
        // Vérifier si la validation échoue
        if ($validator->fails()) {
            return response()->json([
                'status' => 'ERROR',
                'errors' => $validator->errors()
            ], 400); // 400 Bad Request
        }
    
        // Effectuer la recherche si la validation passe
        $nom = $request->input('nom');
        $places = Place::where('nom', 'like', '%' . $nom . '%')->get();
    
        return response()->json([
            'places' => $places,
            'status' => 'SUCCESS'
        ]);
    }

    public function getAllArticles(){
        $articles = Article::get();

        return response()->json(["articles" => $articles,"status" => "SUCCESS"]);
    }

    public function searchArticle(Request $request)
    {
        // Définir les règles de validation
        $validator = Validator::make($request->all(), [
            'nomArticle' => 'required|string|min:1',
        ]);
    
        // Vérifier si la validation échoue
        if ($validator->fails()) {
            return response()->json([
                'status' => 'ERROR',
                'errors' => $validator->errors()
            ], 400); // 400 Bad Request
        }
    
        // Effectuer la recherche si la validation passe
        $nom = $request->input('nomArticle');
        $articles = Article::where('nomArticle', 'like', '%' . $nom . '%')->get();
    
        return response()->json([
            'articles' => $articles,
            'status' => 'SUCCESS'
        ]);
    }
}
