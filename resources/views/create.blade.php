@extends('layouts.1', ['page' => "Nouveau patient " , 'pageSlug' => 'patient', 'sup' => 'patient'])
@section('content')
    <div class="d-flex justify-content-start">
        <div class="col-md-12">
            <div class=" d-flex justify-content-between text-center mb-3">
                <h3 class="fw-bold">Nouveau patient</h3>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show " role="alert">
                    <p>{{ $message }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($message = Session::get('fail'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p>{{ $message }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="store_patient" role="form" method="post" class="form">
                @csrf
                <div class="card col-md-12 mb-3">
                    <h4 class="card-header text-center">Informations du patient</h4>
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold ">Prénom </span>
                                    <input type="text" class="form-control" name="prenom" required>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold ">Nom </span>
                                    <input type="text" class="form-control" name="nom" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold ">Age</span>
                                    <input type="number" class="form-control" name="age" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold ">Téléphone</span>
                                    <input type="number" class="form-control" name="telephone" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold ">Situation fam.</span>
                                    <select class="form-select " name="situ_fami" >
                                        <option value="Marié" >Marié</option>
                                        <option value="Célibataire"  >Célibataire</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold ">Assuré</span>
                                    <select class="form-select " name="assure" >
                                        <option value="Oui" >Oui</option>
                                        <option value="Non"  >Non</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold ">Adresse</span>
                                    <textarea name="adresse" class="form-control" id="" rows="2" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-5" style="text-align: center;">
                    <div class=" form-group">
                        <button type="submit" name="submit" class="btn btn-primary fw-bold">Ajouter</button>
                        <button type="reset" class="btn btn-outline-danger  fw-bold">Annuler</button>

                    </div>
                </div>
            </form>
        </div>


    </div>
    <style>
        .btn-default:hover {
            background-color: red !important;
            color: white;
        }

        .btn-primary {
            color: white;
        }

        a {
            text-decoration: none;
        }
        .txt {
            width: 150px;
            background: lavender;
        }
        .input-group-text{
            background: lavender;
        }

    </style>
@endsection
