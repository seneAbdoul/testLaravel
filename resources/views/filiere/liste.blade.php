@extends('layouts.app')
@section('content')
 @include('partials.menu')
 <div class="container mt-16 ml-32" style="width: 80%;">
    <div class="row justify-content-center" style="width: 100%;">
         <h1 class="text-center">Liste des Filieres</h1>
         @if(session('success'))
             <div class="alert alert-success">
                {{session('success')}}
             </div>
        @endif
      <div class="col-8" style="width: 100%;">
        <a href="{{ route('filiere.page.create') }}" class="btn btn"
        style="background-color: rgb(5, 68, 104) ;float: right;color: white">
            Ajouter Filiere</a>
        <div class="overflow-x-auto" style="width: 100%;">
          <table class="table-auto min-w-full divide-y divide-gray-200" style="width: 100%;">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Identifiant</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libelle</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($filieres as $filiere)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $filiere->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $filiere->libelle }}</td>
                <td class="px-6 py-4 whitespace-nowrap flex justify-around">
                    <a href="{{ route('filiere.page.edit', $filiere) }}"><span class="icon"><i class="fas fa-pen"></i></span></a>
                    <form action="{{ route('filiere.page.destroy', $filiere->id) }}" method="post">
                      @csrf
                      @method("DELETE")
                     <button class="btn btn-primary">delete</button>
                    </form>
                    
                </td>
            @endforeach
   
              <!-- Plus de lignes peuvent être ajoutées ici -->
            </tbody>
          </table>
          <div class="paggination" style="float: right;margin-top:2%">
              {{ $filieres->links() }}
          </div>
               
        </div>
      </div>
    </div>
  </div>
@endsection