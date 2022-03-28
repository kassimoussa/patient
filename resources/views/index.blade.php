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
         {{-- <button type="button"  class="btn  btn-dark btn-sm mb-2" onclick="consulte()" >Button</button> --}}


         <div id="patient_list" class="pds ">
             <table class="table tablesorter table-sm table-hover" id="">
                 <thead class="bg-dark text-white text-center">
                     <th>N° </th>
                     <th>Prénom </th>
                     <th>Nom </th>
                     <th>Age</th>
                     <th>Téléphone</th>
                     <th>Consultation</th>
                     <th class="">Actions</th>
                 </thead>
                 <tbody class="text-center">
                     @if (!empty($patients) && $patients->count())
                         @php
                             $cntp = 1;
                             $conid = 'consultations' . $cntp;
                         @endphp
                         @foreach ($patients as $key => $patient)
                             <tr>
                                 {{-- <tr onclick="myFunction()" data-href="{{ $patient->id }}"> --}}
                                 <td>{{ $patient->id }}</td>
                                 <td>{{ $patient->prenom }}</td>
                                 <td>{{ $patient->nom }}</td>
                                 <td>{{ $patient->age }}</td>
                                 <td>{{ $patient->telephone }}</td>
                                 @php
                                     $consultations = Consultation::where('id_patient', $patient->id)->get();
                                 @endphp
                                 <td> <select class="form-select " id="{{ $conid }}">
                                         <option value=""  selected>Choisir une date</option>
                                         @foreach ($consultations as $consul)
                                             <option value="{{ $consul->id }}">{{ date('d/m/Y à H:m:i', strtotime($consul->date_consult))  }}</option>
                                         @endforeach
                                     </select>
                                 </td>
                                 <td>
                                     <a href="{{ url('show_patient', $patient) }}" class="btn btn-link"
                                         data-bs-toggle="tooltip" data-bs-placement="left" title="Voir + sur le patient ">
                                         <i class="fas fa-eye"></i>
                                     </a>
                                     <a href="{{ url('create_consultation', $patient) }}" class="btn btn-link"
                                         data-bs-toggle="tooltip" data-bs-placement="left"
                                         title="Ajouter une consultation ">
                                         <i class="fas fa-file-medical"></i>
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
                             @php
                             $cntp = $cntp + 1;
                             $conid = 'consultations' . $cntp;
                         @endphp
                         @endforeach
                     @else
                         <tr>
                             <td colspan="10">There are no data.</td>
                         </tr>
                     @endif
                 </tbody>
             </table>
         </div>

         <div id='consult' class="hidden">
             <div class="card col mb-3">
                 <h4 class="card-header text-center bg-dark text-white">Consultation</h4>
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

     <script>
         /*  var btn = document.getElementById("row");
               btn.onclick = function() {
                   var div = document.getElementById("patient_list");
                     if (div) {
                       div.style.width = "600px";
                   }  
                   div.removeClass("myDivStartHeight").addClass("myDivNewHeight");
               }; */
         /* 
                  $("#row").click(function() {
                      $("#patient_list").removeClass("myDivStartHeight").addClass("myDivNewHeight");
                  }); */
         var parenttbody = document.getElementById("tbd");
         $('*[data-href]').on('click', function() {
             var pid = $(this).data("href");
             console.log(pid);
             /* $("#tbd").children().remove();

             for (var i = 1; i <= pid; i++) {
                 // creates a table row
                 var row = document.createElement("tr");
                 var cell = document.createElement("td");
                 var cellText = document.createTextNode("cell in row " + i );
                     cell.appendChild(cellText);
                     row.appendChild(cell);

                 // add the row to the end of the table body
                 parenttbody.appendChild(row);
             } */

             $.ajax({
                 type: "GET",
                 url: "{{ url('getConsultation') }}?pid=" + pid,
                 success: function(res) {

                     if (res) {
                         $("#tbd").children().remove();
                         $.each(res, function(key, value) {
                             /* $("#tbd").append('<tr>' + value +
                                 '</tr>'); */
                             console.log(value);
                             var row = document.createElement("tr");
                             var cell = document.createElement("td");
                             var cellText = document.createTextNode(value);
                             cell.appendChild(cellText);
                             row.appendChild(cell);

                             // add the row to the end of the table body
                             parenttbody.appendChild(row);
                         });

                     } else {
                         $("#tbd").children().remove();
                     }
                 }
             });
         });

         function myFunction() {
             var pl = document.getElementById("patient_list");
             pl.classList.add("pd_70");
             pl.classList.remove("pds");

             var cl = document.getElementById("consult_list");
             cl.classList.add("show", "cld_30");
             cl.classList.remove("hidden");





         }

         function consulte() {

             var pl = document.getElementById("patient_list");
             pl.classList.add("pd_50");
             pl.classList.remove("pd_70");

             var cl = document.getElementById("consult_list");
             cl.classList.add("cld_10");
             cl.classList.remove("cld_30");

             var c = document.getElementById("consult");
             c.classList.add("show", "cdw_40");
             c.classList.remove("hidden");

         }
     </script>

     <script>
         $('select').change(function() { 
             var cid = $(this).val();

             if (cid) {

                 $.ajax({
                     type: "GET",
                     url: "{{ url('getConsultation') }}?cid=" + cid,
                     success: function(res) {

                         if (res) {
                             console.log(res.motif);
                             document.getElementById('medecin').value = res.medecin;
                             //$('#motif').text(res.motif); 
                             document.getElementById('motif').value = res.motif;
                             document.getElementById('resultats_clinique').value = res.resultats_clinique;
                             document.getElementById('diagnostiques').value = res.diagnostiques;
                             document.getElementById('traitements').value = res.traitements;
                             document.getElementById('resultats_paraclinique').value = res.resultats_paraclinique;

                         } else {

                             $("#serv").empty();
                         }
                     }
                 });
             } else {

                 $("#serv").empty();
             }
             var pl = document.getElementById("patient_list");
             pl.classList.add("col-md-8");
             pl.classList.remove("pds"); 

             var c = document.getElementById("consult");
             c.classList.add("show", "col-md-4");
             c.classList.remove("hidden");  
         });
     </script>
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
