@extends('layouts.1', ['page' => "Update patient " , 'pageSlug' => 'patient', 'sup' => 'patient'])
@section('content')
    <div class="d-flex justify-content-start">
        <div class="col-md-12">
            <div class=" d-flex justify-content-between text-center mb-3">
                <h3 class="fw-bold">Update Patient</h3>
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
            <form action="{{ url('update_patient', $patient) }}" role="form" method="post" class="form">
                @csrf
                @method('PUT')
                <div class="card col-md-12 mb-3">
                    <h4 class="card-header text-center">Informations du patient</h4>
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold ">Prénom </span>
                                    <input type="text" class="form-control" name="prenom" required value="{{ $patient->prenom }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold ">Nom </span>
                                    <input type="text" class="form-control" name="nom" required value="{{ $patient->nom }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold ">Age</span>
                                    <input type="number" class="form-control" name="age" required value="{{ $patient->age }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold ">Téléphone</span>
                                    <input type="number" class="form-control" name="telephone" required value="{{ $patient->telephone }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold ">Situation fam.</span>
                                    <select class="form-select " name="situ_fami" >
                                        <option value="Marié" @if ($patient->situ_fami  == 'Marié') {{ 'selected' }} @endif >Marié</option>
                                        <option value="Célibataire" @if ($patient->situ_fami  == 'Célibataire') {{ 'selected' }} @endif >Célibataire</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold ">Assuré</span>
                                    <select class="form-select " name="assure" >
                                        <option value="Oui" @if ($patient->assure  == 'Oui') {{ 'selected' }} @endif  >Oui</option>
                                        <option value="Non" @if ($patient->assure  == 'Non') {{ 'selected' }} @endif  >Non</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold ">Adresse</span>
                                    <textarea name="adresse" class="form-control" id="" rows="2" required  >{{ $patient->adresse }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-5" style="text-align: center;">
                    <div class=" form-group">
                        <button type="submit" name="submit" class="btn btn-primary fw-bold">Modifier</button>
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
