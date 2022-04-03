<div class="row">
    <div class="d-flex justify-content-between mb-3">
        <h3 class="over-title mb-2">Liste des patients </h3>
        <button type="button" name="add_document" class="btn btn-dark fw-bold" data-bs-toggle="modal"
            data-bs-target="#addPatient">Ajouter</button>
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
    <div class="d-flex justify-content-between mb-2">
        <div class="input-group  mb-3">
            <span class="input-group-text bg-dark text-white fw-bold ">Recherche</span>
            <input type="text" class="form-control " wire:model="searche" placeholder="Par N° telephone "
                id="searchInput">
            <button class="btn bg-transparent" style="margin-left: -40px; z-index: 100;"
                onclick='window.location.reload(false)'>
                <i class="fa fa-times"></i>
            </button>
        </div>

        <div wire:ignore.self class="modal fade" id="addPatient" tabindex="-1" aria-labelledby="newPatient"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h3>Nouveau Patient </h3>
                        <button type="button" class="btn btn-primary fw-bold" data-bs-dismiss="modal">Fermer</button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="storePatient" role="form" method="post" class="form">
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
                            <div class="row mb-2" style="text-align: center;">
                                <div class=" form-group">
                                    <button type="submit" name="submit" class="btn btn-primary fw-bold"
                                        data-bs-dismiss="modal">Ajouter</button>
                                    <button type="reset" class="btn btn-outline-danger  fw-bold">Annuler</button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div id="patient_list" class="{{ $pl }}">
            <table class="table tablesorter table-sm table-hover" id="">
                <thead class="bg-dark text-white  ">
                    <th>Prénom </th>
                    <th>Nom </th>
                    <th>Age</th>
                    <th>Téléphone</th>
                    <th class="text-center">Actions</th>
                </thead>
                <tbody class=" ">
                    @if (!empty($patients) && $patients->count())
                        @foreach ($patients as $key => $patient)
                            <tr>
                                <td>{{ ucfirst($patient->prenom) }}</td>
                                <td>{{ ucfirst($patient->nom) }}</td>
                                <td>{{ $patient->age }}</td>
                                <td>{{ $patient->telephone }}</td>

                                <td class="text-center">
                                    <a href="{{ url('show_patient', $patient) }}" class="btn btn-link"
                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Voir + sur le patient ">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a  class="btn btn-link" wire:click="consults({{ $patient->id }})" >
                                        <i class="fas fa-book-medical" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Voir les consultations du patient "></i>
                                    </a>
                                    <a href="{{ url('create_consultation', $patient) }}" class="btn btn-link"
                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Ajouter une consultation ">
                                        <i class="fas fa-file-medical"></i>
                                    </a>
                                    <a class="btn btn-link" wire:click="editPatient({{ $patient->id }})">
                                        <i class="fas fa-edit" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Modifier "></i>
                                    </a>
                                    <button type="button" class="btn btn-link"  wire:click="deletePatientConfirme({{ $patient->id }})">
                                        <i class="fas fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Supprimer le patient de la base des données "></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">There are no data.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>


        <div id="consultation_list" class="{{ $cl }}">
            <table class="table tablesorter table-sm table-hover " id="">
                <thead class="bg-dark text-white text-center">
                    <th>Date</th>
                </thead>
                <tbody class="text-center">
                    @if (!empty($consultations))
                        @foreach ($consultations as $key => $consultation)
                            <tr wire:click="spefconsult({{ $consultation->id }})">
                                <td>{{ date('d/m/Y à H:m:i', strtotime($consultation->date_consult)) }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">There are no data.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>


        @if (!empty($speconsult))
            <div id='consult' class="{{ $spc }}">
                <div class="card col mb-3">
                    <div class="card-header bg-dark  d-flex justify-content-between mb-2 mt-0">
                        <h4 class="text-center text-white">Consultation</h4>
                        <a href="#" id="editbtn" class="btn btn-link" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Modifier">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Médecin <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="medecin" id="medecin" readonly
                                value="{{ $speconsult->medecin }}">
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Motif de consultations <span
                                    class="text-danger">*</span></label>
                            <textarea name="motif" class="form-control" rows="2" id="motif" readonly>{{ $speconsult->motif }}</textarea>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Résultats de l'examens clinique <span
                                    class="text-danger">*</span></label>
                            <textarea name="resultats_clinique" class="form-control" rows="2" id="resultats_clinique"
                                readonly>{{ $speconsult->resultats_clinique }}</textarea>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Diagnostique medical <span
                                    class="text-danger">*</span></label>
                            <textarea name="diagnostiques" class="form-control" rows="2" id="diagnostiques"
                                readonly>{{ $speconsult->diagnostiques }}</textarea>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Résultats de l'examens paraclinique <span
                                    class="text-danger">*</span></label>
                            <textarea name="resultats_paraclinique" class="form-control" rows="2" id="resultats_paraclinique"
                                readonly>{{ $speconsult->resultats_paraclinique }}</textarea>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Traitements à préscrire <span
                                    class="text-danger">*</span></label>
                            <textarea name="traitements" class="form-control" rows="2" id="traitements"
                                readonly>{{ $speconsult->traitements }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div wire:ignore.self class="modal fade" id="editPatient" tabindex="-1" aria-labelledby="editPatient"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h3>Modif Patient </h3>
                        <button type="button" class="btn btn-primary fw-bold" data-bs-dismiss="modal">Fermer</button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="updatePatient" role="form" method="post" class="form">
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
                            <div class="row mb-2" style="text-align: center;">
                                <div class=" form-group">
                                    <button type="submit" name="submit" class="btn btn-primary fw-bold"
                                        data-bs-dismiss="modal">Modifier</button>
                                    <button type="reset" class="btn btn-outline-danger  fw-bold">Annuler</button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div wire:ignore.self class="modal fade" id="deletePatient" tabindex="-1" aria-labelledby="deletePatient"
            aria-hidden="true">
            <div class="modal-dialog   modal-dialog-centered  " role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h3>Confirmation Suppression </h3>
                        <button type="button" class="btn btn-primary fw-bold" data-bs-dismiss="modal">Fermer</button>
                    </div>
                    <div class="modal-body ">
                        <h3 class="text-center">Confirmer la suppression du patient</h3>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button  class="btn btn-primary fw-bold"
                            data-bs-dismiss="modal" wire:click="deletePatient()" >Supprimer</button>
                        <button type="reset" class="btn btn-outline-danger  fw-bold"
                            data-bs-dismiss="modal">Annuler</button>
                    </div>
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

    .txt {
        width: 170px;
        background: lavender;
    }

</style>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addPatient').modal('hide');
        });

        window.addEventListener('show-patient-edit-modal', event => {
            $('#editPatient').modal('show');
        });

        window.addEventListener('show-patient-delete-modal', event => {
            $('#deletePatient').modal('show');
        });
    </script>
@endpush
