@extends('layouts.1', ['page' => "Update consultation " , 'pageSlug' => 'patient', 'sup' => 'patient'])
@section('content')
    <div class="d-flex justify-content-start">
        <div class="col-md-12">
            <div class=" d-flex justify-content-between text-center mb-3">
                <h3 class="fw-bold">Update consultation</h3>
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
            <form action="{{ url('update_consultation', $consultation) }}" role="form" method="post" class="form">
                @csrf
                @method('PUT')
                <div class="card col mb-3">
                    <h4 class="card-header text-center bg-dark text-white">Consultation</h4>
                    <div class="card-body">
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Médecin <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="medecin" id="medecin" value="{{ $consultation->medecin }}" >
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Motif de consultations <span class="text-danger">*</span></label>
                            <textarea name="motif" class="form-control"  rows="2" id="motif"  >{{ $consultation->motif }}</textarea>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Résultats de l'examens clinique <span
                                    class="text-danger">*</span></label>
                            <textarea name="resultats_clinique" class="form-control"  rows="2" id="resultats_clinique"  >{{ $consultation->resultats_clinique }}</textarea>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Diagnostique medical <span class="text-danger">*</span></label>
                            <textarea name="diagnostiques" class="form-control"  rows="2" id="diagnostiques"  >{{ $consultation->diagnostiques }}</textarea>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Résultats de l'examens paraclinique <span
                                    class="text-danger">*</span></label>
                            <textarea name="resultats_paraclinique" class="form-control"  rows="2" id="resultats_paraclinique"  >{{ $consultation->resultats_paraclinique }}</textarea>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Traitements à préscrire <span class="text-danger">*</span> </label>
                            <textarea name="traitements" class="form-control"  rows="2" id="traitements"  >{{ $consultation->traitements }}</textarea>
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
