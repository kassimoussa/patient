@extends('layouts.1', ['page' => "Nouvelle consultation " , 'pageSlug' => 'consultation', 'sup' => 'consultation'])
@section('content')
    <div class="d-flex justify-content-start">
        <div class="col-md-12">
            <div class=" d-flex justify-content-between text-center mb-3">
                <h3 class="fw-bold">Nouvelle consultation</h3>
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
            <form action="/store_consultation" role="form" method="post" class="form">
                @csrf
                <div class="card col mb-3">
                    <h4 class="card-header text-center bg-dark text-white">Consultation</h4>
                    <div class="card-body">
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Médecin <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="medecin" required>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Motif de consultations <span class="text-danger">*</span></label>
                            <textarea name="motif" class="form-control" id="" rows="2" required></textarea>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Résultats de l'examens clinique <span class="text-danger">*</span></label>
                            <textarea name="resultats_clinique" class="form-control" id="" rows="2" required></textarea>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Diagnostique medical <span class="text-danger">*</span></label>
                            <textarea name="diagnostiques" class="form-control" id="" rows="2" required></textarea>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Résultats de l'examens paraclinique <span class="text-danger">*</span></label>
                            <textarea name="resultats_paraclinique" class="form-control" id="" rows="2" required></textarea>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Traitements à préscrire <span class="text-danger">*</span></label>
                            <textarea name="traitements" class="form-control" id="" rows="2" required></textarea>
                        </div>
                    </div>
                </div> 

                <div class="row mb-5" style="text-align: center;">
                    <div class=" form-group">
                        <button type="submit" name="submit" class="btn btn-primary fw-bold">Ajouter</button>
                        <button type="reset" class="btn btn-outline-danger  fw-bold">Annuler</button>
                        <input type="text" name="date_consult" value="{{ date('Y-m-d H:i:s') }}" hidden>
                        <input type="text" class="form-control" name="id_patient" value="{{ $patient->id }}" hidden>

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
