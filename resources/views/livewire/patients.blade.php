<div class="row">
    <div class="d-flex justify-content-between mb-2">
        <div class="input-group  mb-3">
            <span class="input-group-text bg-dark text-white fw-bold ">Recherche</span>
            <input type="text" class="form-control " wire:model="searche"
                placeholder="Par N° telephone ">
        </div>
    </div>
    <div id="patient_list" class="{{ $pl }}">
        <table class="table tablesorter table-sm table-hover" id="">
            <thead class="bg-dark text-white text-center">
                <th>N° </th>
                <th>Prénom </th>
                <th>Nom </th>
                <th>Age</th>
                <th>Téléphone</th>
                <th class="">Actions</th>
            </thead>
            <tbody class="text-center">
                @if (!empty($patients) && $patients->count())
                    @foreach ($patients as $key => $patient)
                        <tr wire:click="consults({{ $patient->id }})">
                            <td>{{ $patient->id }}</td>
                            <td>{{ $patient->prenom }}</td>
                            <td>{{ $patient->nom }}</td>
                            <td>{{ $patient->age }}</td>
                            <td>{{ $patient->telephone }}</td>

                            <td>
                                <a href="{{ url('show_patient', $patient) }}" class="btn btn-link"
                                    data-bs-toggle="tooltip" data-bs-placement="left" title="Voir + sur le patient ">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ url('create_consultation', $patient) }}" class="btn btn-link"
                                    data-bs-toggle="tooltip" data-bs-placement="left" title="Ajouter une consultation ">
                                    <i class="fas fa-file-medical"></i>
                                </a>
                                <a href="{{ url('edit_patient', $patient) }}" class="btn btn-link"
                                    data-bs-toggle="tooltip" data-bs-placement="left" title="Modifier ">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ url('delete', $patient) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-link" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Supprimer le patient de la base des données "
                                        onclick="confirm('Etes vous sûr de supprimer le patient ?') ? this.parentElement.submit() : ''">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
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

    @if (!empty($consultations))
        <div id="consultation_list" class="{{ $cl }}">
            <table class="table tablesorter table-sm table-hover " id="">
                <thead class="bg-dark text-white text-center">
                    <th>Date</th>
                </thead>
                <tbody class="text-center">
                    @if (!empty($consultations) && $consultations->count())
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
    @endif

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
                        <label class="control-label">Diagnostique medical <span class="text-danger">*</span></label>
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



</div>
