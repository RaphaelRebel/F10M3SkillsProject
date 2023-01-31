@extends('layouts.app')
@section('content')
<div class="container">
         <div class="row justify-content-center">
             <div class="col-md-8">
                 <div class="card">
             <div class="single-container">
     
                 <form method="POST" action="{{ route('product-update', $product->id) }}" enctype="multipart/form-data">
                     @csrf
     
                     <!-- Category -->
                     <div class="producten__form">
                         <label class="producten__form-label" for="producten_titel" value="Titel">Titel</label>
                         <input id="producten_titel" class="producten__form-input block w-full" type="text" name="producten_titel" :value="old('producten_titel')" required autofocus/>
                         
                         <label class="producten__form-label" for="producten_descriptie" value="Category">Descriptie</label>
                         <input id="producten_descriptie" class="producten__form-input block w-full" type="text" name="producten_descriptie" :value="old('producten_descriptie')" required autofocus/>
                         
                         <label class="producten__form-label" for="producten_prijs" value="Category">Prijs</label>
                         <input id="producten_prijs" class="producten__form-input block w-full" type="text" name="producten_prijs" :value="old('producten_prijs')" required autofocus/>
                         
                         <label class="producten__form-label" for="producten_aantal" value="Category">Aantal</label>
                         <input id="producten_aantal" class="producten__form-input block w-full" type="text" name="producten_aantal" :value="old('producten_aantal')" required autofocus/>
                      </div>
     
     
     
                     <div class="flex items-center justify-end mt-4">
     
     
                         <button class="m-5">
                             {{ __('Toevoegen') }}
                         </button>
                     </div>
                 </form>
             </div>  
                 </div>
             </div>
         </div>
</div>      
     
     
     @endsection
     