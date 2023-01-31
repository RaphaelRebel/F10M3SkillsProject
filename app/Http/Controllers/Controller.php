<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function newProduct(){

       

        return view('newProduct');
    }

    public function overzicht(){

         //Haal alle producten op van de gebruiker
         $userId = Auth::id();
         $userProducts = products::where('userId', $userId)->get();


        return view('home', ['products' => $userProducts]);
    }



    //Maak een nieuw product
    public function productStore( Request $request){

        //Hier de benodigdheden opslaan
     $productdata = $request->validate([
            'producten_titel' => 'required|min:3',
            'producten_descriptie' => 'required|min:10',
            'producten_prijs' => 'required|min:1',
            'producten_aantal' => 'required|min:1',
            'afbeelding' => 'image'
        ]);

        //Voeg een foto toe
        $newFilename = $productdata['afbeelding']->store('fotos', 'public');
        $productdata['afbeelding'] = $newFilename;

        //Haal de user id die momenteel ingelogd is
        $userId = Auth::id();

        //Alle info halen om een product te migraten
        $product = new products();
        //Laat zien welke informatie je wilt zien
        $product->title = $productdata['producten_titel'];
        $product->description = $productdata['producten_descriptie'];
        $product->price = $productdata['producten_prijs'];
        $product->amount = $productdata['producten_aantal'];
        $product->afbeelding = $productdata['afbeelding'];
        $product->userId = $userId;

        $product->save();

        //Hier alle gegevens opslaan die je krijgt van dashboard-todo-create


        return redirect('/home');
    }

    public function productSingle($id){
        $product = products::find($id);

        return view('product-single', ['product' => $product]);
    }

    public function productRemove($id){
        $product = products::find($id);
        $product->delete();
        return redirect('/home');
    }

    public function editProductPage($id){
        $product = products::find($id);
        return view('editProduct', ['product' => $product]);
    }

    public function updateProduct(Request $request, $id){

        //Haal alle todos op
        $product = products::find($id);
    
        // Haal de update requests
            $productTitle = $request->input('producten_titel');
            $productDescription = $request->input('producten_descriptie');
            $productPrice = $request->input('producten_prijs');
            $productAmount = $request->input('producten_aantal');    
    
            $product->title = $productTitle;
            $product->description = $productDescription;
            $product->price = $productPrice;
            $product->amount = $productAmount;

            
    
            $product->save();
    
        // Stop de updates in de database (Code kan beter worden)
    
            return redirect('product/' . $id);
        }
}
