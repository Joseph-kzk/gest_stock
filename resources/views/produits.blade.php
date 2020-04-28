@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">

    <!-- begin alert -->
    @include('layouts/partials/errors')
    <!-- end alert -->

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>Produits en stock</h5>

                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-plus"> Ajouter </i>
                            </button>

                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Quantité</th>
                                        <th>CN</th>
                                        <th>Seuil de sécu</th>
                                        <th>Prix U</th>
                                        <th>Actions</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($produits) > 0)

                                        @foreach($produits as $key=> $produit)
                                            <tr class="">
                                                <td>{{$key+1}}</td>
                                                <td>{{ $produit->nom }}</td>
                                                <td>{{ $produit->description }}</td>
                                                <td>{{ $produit->quantite }}</td>
                                                <td>{{ $produit->id_classe }}</td>
                                                <td>{{ $produit->seuil_securite }}</td>
                                                <td>{{ $produit->prix }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModal5">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal4">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    @endif
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Liste des modals -->

    <!-- Modal d'ajout -->
    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                    <h4 class="modal-title">Nouveau stock</h4>
                    
                </div>

                <form action="{{ route('produits.store') }}" method="post">
                    @method('post')
                    @csrf
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nom" placeholder="Nom" class="form-control"> 
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" name="description" rows="5" name="description" placeholder="-- Description --"></textarea>
                                
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="quantite" placeholder="Quantité" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <select class="select2_demo_1 form-control" name="id_classe" placeholder="CN">
                                        
                                        

                                        @if(count($types) > 0)

                                            @foreach($types as $type)
                                                <option >{{ $type->numero }}</option>
                                            @endforeach

                                            @else
                                            <option >Aucune classe nomenclature</option>

                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="select2_demo_1 form-control" name="seuil_securite" placeholder="Seuil de sécurité">
                                        <option >Seuil de sécurité</option>
                                        <option>5</option>
                                        <option>10</option>
                                        <option>15</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="prix" placeholder="Prix unitaire" class="form-control"> 
                                </div>

                            </div>
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form> 

            </div>
        </div>
    </div>


    <!-- Modal de modification -->
    <div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                    <h4 class="modal-title">stock</h4>
                    
                </div>
                <form action="{{ route('produits.update', $produit->reference) }} " method="POST">
                    @method('put')
                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nom" value="{{$produit->nom}}" class="form-control"> 
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control"  rows="5" name="description" value="" >{{$produit->description}}</textarea>
                                
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="quantite" value="{{$produit->quantite}}" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <select class="select2_demo_1 form-control" name="id_classe">
                                        
                                        <option >{{$produit->id_classe}}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="select2_demo_1 form-control" name="seuil" >
                                        
                                        <option>{{$produit->seuil_securite}}</option>
                                        <option>10</option>
                                        <option>15</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="prix" value="{{$produit->prix}}" class="form-control"> 
                                </div>

                            </div>
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>


    <!-- Modal de suppression -->
    <div class="modal inmodal fade" id="myModal4" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-times modal-icon" style="color:red"></i>
                    <h4 class="modal-title">ATTENTION !!</h4>
                    <h3>voulez-vous vraiment supprime cet élément ?</h3>
                </div>

                <form action="{{ route('produits.destroy', $produit->reference) }}" method="POST">
                    @method('delete')
                    @csrf
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">NON</button>
                        <button type="submit" class="btn btn-primary">OK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
