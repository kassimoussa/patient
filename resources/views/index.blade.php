 @php
     use App\Models\Consultation;
 @endphp
 @extends('layouts.1', ['page' => 'Liste des patients', 'pageSlug' => 'list', 'sup' => ''])
 @section('content')

 {{-- <div class="d-flex justify-content-between mb-3">
    <h3 class="over-title mb-2">Liste des patients </h3>
    <a href="create_patient" class="btn  btn-primary  fw-bold" >Ajouter</a>
    <button type="button" name="add_document" class="btn btn-dark fw-bold" data-bs-toggle="modal"
        data-bs-target="#addPatient">Ajouter</button>
</div> --}}
     <div class="row">
         
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
    {{--  <div   class="modal fade" id="addPatient" tabindex="-1" aria-labelledby="newPatient"  aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h3>Nouveau Patient </h3>
                   
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storePatient" role="form" method="post" class="form" > 
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold txt">Prénom </span>
                                    <input type="text" class="form-control" wire:model="prenom" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold txt">Nom </span>
                                    <input type="text" class="form-control" wire:model="nom" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold txt">Age</span>
                                    <input type="number" class="form-control" wire:model="age" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold txt">Téléphone</span>
                                    <input type="number" class="form-control" wire:model="telephone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold txt">Situation fam.</span>
                                    <select class="form-select " wire:model="situ_fami">
                                        <option value="Marié">Marié</option>
                                        <option value="Célibataire">Célibataire</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold txt ">Assuré</span>
                                    <select class="form-select " wire:model="assure">
                                        <option value="Oui">Oui</option>
                                        <option value="Non">Non</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text  fw-bold  txt">Adresse</span>
                                    <textarea wire:model="adresse" class="form-control" id="" rows="2" required></textarea>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div> --}}
     
 @endsection
