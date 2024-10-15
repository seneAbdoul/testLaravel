@extends('layouts.app')
@section('content')
  @include('partials.menu')
  <div class="container mt-12">
    <h1 class="text-center mb-4" style="color:rgb(5, 68, 104)">
    @csrf
    @if($filiere->exists)
       Modifier Filiere
    @else
       Ajouter Filiere
    @endif   
     </h1>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="shadow p-3 mb-5 bg-body rounded">
                <form action="{{ route($filiere->exists ? 'filiere.page.update' : 'filiere.page.store', $filiere) }}" method="post" >

                @csrf
                  @method($filiere->exists ? 'PUT' : 'POST')

                    @csrf
                    <div class="mb-3">
                        <label for="libelle" class="form-label">libelle :</label>
                        @if($filiere->exists)
                            <input type="text" id="libelle" name="libelle" class="form-control" value="{{ $filiere->libelle }}">
                        @else
                            <input type="text" id="libelle" name="libelle" class="form-control">
                        @endif
                   </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" style="background-color:rgb(5, 68, 104);">   
                         @csrf
                        @if($filiere->exists )
                            Modifier Filiere
                        @else
                            Ajouter Filiere
                        @endif 
                        </button>
                    </div>
                </form>
            </div>
        </div>
     </div>
  </div>

@endsection