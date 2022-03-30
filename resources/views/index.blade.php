 @php
     use App\Models\Consultation;
 @endphp
 @extends('layouts.1', ['page' => 'Liste des patients', 'pageSlug' => 'list', 'sup' => ''])
 @section('content')

     <div class="row">
         <div class="d-flex justify-content-between mb-3">
             <h3 class="over-title mb-2">Liste des patients </h3>
             <a href="create_patient" class="btn  btn-primary  fw-bold">Ajouter</a>
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
         <livewire:patients /> 
         <div id='consult' class="hidden">
             <div class="card col mb-3"> 
                 <div class="card-header bg-dark  d-flex justify-content-between mb-2 mt-0">
                    <h4 class="text-center text-white">Consultation</h4>
                    <a href="#"  id="editbtn" class="btn btn-link"
                        data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Modifier">
                        <i class="fas fa-edit"></i>
                    </a>
                </div>
                 <div class="card-body"> 
                     <div class="form-group control-label mb-1">
                         <label class="control-label">Médecin <span class="text-danger">*</span></label>
                         <input type="text" class="form-control" name="medecin" id="medecin" readonly>
                     </div>
                     <div class="form-group control-label mb-1">
                         <label class="control-label">Motif de consultations <span class="text-danger">*</span></label>
                         <textarea name="motif" class="form-control"  rows="2" id="motif" readonly></textarea>
                     </div>
                     <div class="form-group control-label mb-1">
                         <label class="control-label">Résultats de l'examens clinique <span
                                 class="text-danger">*</span></label>
                         <textarea name="resultats_clinique" class="form-control"  rows="2" id="resultats_clinique" readonly></textarea>
                     </div>
                     <div class="form-group control-label mb-1">
                         <label class="control-label">Diagnostique medical <span class="text-danger">*</span></label>
                         <textarea name="diagnostiques" class="form-control"  rows="2" id="diagnostiques" readonly></textarea>
                     </div>
                     <div class="form-group control-label mb-1">
                         <label class="control-label">Résultats de l'examens paraclinique <span
                                 class="text-danger">*</span></label>
                         <textarea name="resultats_paraclinique" class="form-control"  rows="2" id="resultats_paraclinique" readonly></textarea>
                     </div>
                     <div class="form-group control-label mb-1">
                         <label class="control-label">Traitements à préscrire <span class="text-danger">*</span></label>
                         <textarea name="traitements" class="form-control"  rows="2" id="traitements" readonly></textarea>
                     </div>
                 </div>
             </div>
         </div>


     </div>

     <style>
        .pds {
            width: 100%;
        }

        .pd_70 {
            width: 70%;
        }

        .pd_60 {
            width: 60%;
        }

        .pd_50 {
            width: 50%;
        }

        .hidden {
            display: none;
        }

        .show {
            display: block;
        }

        .cld_30 {
            width: 30%;
        }

        .cld_10 {
            width: 10%;
        }

        .cdw_40 {
            width: 40%;
        }

    </style>
     
 @endsection
