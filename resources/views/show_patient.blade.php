@extends('layouts.1', ['page' => "Informations du patient " , 'pageSlug' => 'patient', 'sup' => 'patient'])
@section('content')
    <div class="d-flex justify-content-start">
        <div class="col-md-12">  
                <div class="card col-md-12 mb-3">
                    <h4 class="card-header text-center">Informations du patient</h4>
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold txt ">Prénom </span>
                                    <input type="text" class="form-control wbg" name="prenom" value="{{ $patient->prenom }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold txt ">Nom </span>
                                    <input type="text" class="form-control wbg" name="nom" value="{{ $patient->nom }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold txt ">Age</span>
                                    <input type="text" class="form-control wbg" name="age" value="{{ $patient->age }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold txt ">Téléphone</span>
                                    <input type="text" class="form-control wbg" name="telephone" value="{{ $patient->telephone }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold txt ">Situation fam.</span>
                                    <input type="text" class="form-control wbg" name="situ_fami" value="{{ $patient->situ_fami }}" readonly> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold txt ">Assuré</span>
                                    <input type="text" class="form-control wbg" name="assure" value="{{ $patient->assure }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold txt ">Adresse</span>
                                    <textarea name="adresse" class="form-control wbg " id="" rows="2" readonly>{{ $patient->adresse }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
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
        .wbg{
            background: white;
        }

    </style>
@endsection
