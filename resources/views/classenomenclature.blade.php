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

                    <h5>Liste des classes nomenclatures</h5>

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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal6">
                                <i class="fa fa-plus"> Ajouter </i>
                            </button>

                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Numéro</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @if(count($types) > 0)

                                        @foreach($types as $key=> $type)
                                        
                                            <tr class="">
                                                <td>{{$key+1}}</td>
                                                <td>{{ $type->numero }}</td>
                                                <td>{{ $type->description }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModal5{{$type->id_classe}}">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal4{{$type->id_classe}}">
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
    <div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Classe nomenclature</h4>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('types.store') }}" method="post">
                            @method('post')
                            @csrf
                            <div class="form-group">

                                <input type="text" name="numero" placeholder="-- Numéro --" class="form-control"> 
                            </div>

                            <div class="form-group row m-b-10">
                                <div class="col-lg-12 col-xl-7">
                                    <textarea class="form-control" rows="3" name="description" placeholder="-- Description --"></textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary" >Enregistrer</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>

    <!-- Modal de modification -->
    <div class="modal inmodal fade" id="myModal5{{$type->id_classe}}" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h5 class="modal-title">Classe nomenclature</h5>
                </div>

                <form action="{{ route('types.update', $type->id_classe) }} " method="POST">
                    @method('put')
                    @csrf

                    <div class="modal-body">

                        <div class="form-group">

                            <input type="text" name="numero" value="{{$type->numero}}" class="form-control"> 
                        </div>

                        <div class="form-group row m-b-10">
                            <div class="col-lg-12 col-xl-7">
                                <textarea class="form-control" rows="3" name="description" placeholder="{{$type->description}}" value="{{$type->description}}"></textarea>
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
    <div class="modal inmodal fade" id="myModal4{{$type->id_classe}}" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-times modal-icon" style="color:red"></i>
                    <h4 class="modal-title">ATTENTION !!</h4>
                    <h3>voulez-vous vraiment supprime cet élément ?</h3>
                </div>
                <form action="{{ route('types.destroy', $type->id_classe) }}" method="POST">
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