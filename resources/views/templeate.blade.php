@extends('layouts.app')

@section('content')
<div class="containers">
    <div class="row ">

        <div class="col-md-12">

            <div class="card" style="width: undefined;border-radius: 13px;box-shadow: 0 4px 4px 0 rgba(165, 165, 165, 0.2), 0 6px 20px 0 rgba(145, 145, 145, 0.19);">
                <div class="card-body">

                    <h4 style="color:#08509c"><b>Schedule</b></h4>
                    <span>Modifications</span>
                    <div class="row row-md-12" style="margin-top:4vh">
                        <div class="col col-md-6">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#create-modal">
                                <b>
                                    <i class="bi bi-file-earmark-plus"></i>Add
                                </b>
                            </button>
                        </div>
                        <div class="col col-md-6" style=" display: flex;flex-direction: row-reverse;">
                            <select id="sort" onchange="sorts()" class=" form-select" style="color:#007bff;border-color:#007bff;border-radius:5px" aria-label="Default select example" style="padding:3px 3pxl;border-radius:5px">
                                <option style="padding:5px 5pxl;border-radius:5px" selected value="asc">A-z</option>
                                <option style="padding:5px 5pxl;border-radius:5px" value="desc">Z-a</option>
                            </select>
                            <p style="margin-right:10px;margin-bottom:0; margin-top:8px;font-weight:bold;color:#08509c">
                                Sort By:</p>
                        </div>
                    </div>
                    <div style="height:360px;overflow-x:hidden;overflow-y:auto;width: 100%">
                        <table class="table table-sm" style="margin-top:1.5vh;margin-bottom:0;">
                            <caption>
                                <div class="row row-md-12">
                                    <div class="col col-md-6">
                                        <!-- List of Patients -->
                                    </div>
                                    <div class="col col-md-6" style=" display: flex;flex-direction: row-reverse;">
                                        <!-- <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </nav> -->
                                    </div>
                                </div>
                            </caption>
                            <thead>
                                <tr>
                                    <th style="color:#08509c" scope="col">Date and Time</th>
                                    <th style="color:#08509c" scope="col">Vaccination Site</th>
                                    <th style="color:#08509c" scope="col">Vaccination Brand</th>
                                    <th style="color:#08509c" scope="col">Available Slot</th>
                                    <th style="color:#08509c;text-align:center" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody id="schedtbody">

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="card-body">
                            List of Patients
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Create Model -->
<form id="add" action="" method="POST" class="users-create-record-model form-horizontal">
    <div id="create-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Add</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body" id="createBody">
                    <div class="mb-3">
                        <label for="dateFormControlInput" class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" id="dateFormControlInput" placeholder="@date" required>
                    </div>
                    <div class="mb-3">
                        <label for="vacSiteleFormControlInput" class="form-label">Vaccination Site</label>
                        <input type="text" name="vacLocation" class="form-control" id="vacSiteleFormControlInput" placeholder="@mmsu" required>
                    </div>
                    <div class="mb-3">
                        <label for="brandFormControlInput" class="form-label">Vaccination Brand</label>
                        <input type="text" name="vacBrand" class="form-control" id="brandFormControlInput" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput" class="form-label">Slot</label>
                        <input type="text" name="vacSlot" class="form-control" id="SlotFormControlInput" placeholder="name@example.com" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel
                    </button>
                    <button type="submit" class="btn btn-success updateCustomer">Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Update Model -->
<form action="" method="POST" class="users-update-record-model form-horizontal">
    <div id="update-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Update</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body" id="updateBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-success updateCustomer">Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Delete Model -->
<div id="remove-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" style="width:55%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="custom-width-modalLabel">Delete</h4>
                <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want to delete this record?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close
                </button>
                <button type="submit" id="delete" class=" btn btn-danger waves-effect waves-light deleteRecord" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>




{{-- Firebase Tasks --}}
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<!-- <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script> -->
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
<script>
    // Initialize Firebase
    firebase.initializeApp({
        apiKey: "AIzaSyD594kQatzBHyUVVeXycIWx5tVjVoOkrOs",
        authDomain: "rncovidsched.firebaseapp.com",
        databaseURL: "https://rncovidsched-default-rtdb.firebaseio.com",
        projectId: "rncovidsched",
        storageBucket: "rncovidsched.appspot.com",
        messagingSenderId: "793794700791",
        appId: "1:793794700791:web:522c9072ed133333e6baf2"
    });
    var db = firebase.firestore();

    function sorts() {

        var select = document.getElementById('sort').value;
        if (select == "asc") {
            $('#schedtbody').html('');
            db.collection('VacSched').orderBy('date', 'asc').get().then((snapshot) => {
                snapshot.docs.forEach(doc => {
                    renderDataPer(doc)
                })
            });
        } else {
            $('#schedtbody').html('');
            db.collection('VacSched').orderBy('date', 'desc').get().then((snapshot) => {
                snapshot.docs.forEach(doc => {
                    renderDataPer(doc)
                })
            });
        }
    }


    // Get Data
    db.collection('VacSched').orderBy('date', 'asc').get().then((snapshot) => {
        snapshot.docs.forEach(doc => {
            renderDataPer(doc)
        })
    });

    const schedInfo = document.querySelector('#schedtbody');

    function renderDataPer(doc) {
        let tr = document.createElement('tr');
        let date = document.createElement('td');
        let vacLocation = document.createElement('td');
        let vacBrand = document.createElement('td');
        let vacSlot = document.createElement('td');
        let edit = document.createElement('td');
        let del = document.createElement('td');
        let btnedit = document.createElement('button');
        let btndel = document.createElement('button');
        let txtedit = document.createElement('label');
        let iconEdit = document.createElement('ion-icon');
        let txtdel = document.createElement('label');
        let iconDel = document.createElement('ion-icon');


        let dtes = new Date().toLocaleDateString('en-us', {
            day: "numeric",
            month: "short"
        });
        doc.data.date = dtes;
        tr.setAttribute('data-id', doc.id);
        date.textContent = dtes + ", 8-5PM";
        vacLocation.textContent = doc.data().vacLocation;
        vacBrand.textContent = doc.data().vacBrand;
        vacSlot.textContent = doc.data().vacSlot;
        btnedit.setAttribute('data-id', doc.id);
        iconEdit.setAttribute('name', 'create-outline');
        iconDel.setAttribute('name', 'trash-outline');
        btnedit.textContent = "Edit";
        btnedit.setAttribute('data-toggle', 'modal');
        btnedit.setAttribute('data-target', '#update-modal');
        btnedit.setAttribute('class', 'btn btn-outline-primary');
        btnedit.setAttribute('style', 'text-alin:center');
        btndel.setAttribute('data-id', doc.id);
        btndel.textContent = "Delete";
        btndel.setAttribute('data-toggle', 'modal');
        btndel.setAttribute('data-target', '#remove-modal');
        btndel.setAttribute('class', 'btn btn-outline-danger');



        tr.appendChild(date);
        tr.appendChild(vacLocation);
        tr.appendChild(vacBrand);
        tr.appendChild(vacSlot);
        btnedit.appendChild(iconEdit);
        btndel.appendChild(iconDel);
        tr.appendChild(edit);
        tr.appendChild(del);
        edit.appendChild(btnedit);
        del.appendChild(btndel);
        btnedit.appendChild(txtedit);
        btndel.appendChild(txtdel);
        tr.appendChild(edit);
        tr.appendChild(del);

        schedInfo.appendChild(tr);
    }


    // Add Data
    const addsched = document.querySelector('#add');
    addsched.addEventListener('submit', (e) => {
        e.preventDefault();
        var values = $("#add").serializeArray();
        console.log(values)
        var date = values[0].value;
        var vacLocation = values[1].value;
        var vacBrand = values[2].value;
        var vacSlot = values[3].value;

        db.collection('VacSched').add({
            date: date,
            vacLocation: vacLocation,
            vacBrand: vacBrand,
            vacSlot: vacSlot
        }).then((docs) => {
            console.log('ID:', docs.id)
        })
        $("#create-modal").modal(hide);
    })




    $("body").on('click', '.btn-outline-danger', function() {
        var id = $(this).attr('data-id');
        console.log(id)
        $("#remove-modal").hide();
        db.collection("VacSched").doc(id).delete().then(() => {
            console.log("Document successfully deleted!");
        }).catch((error) => {
            console.error("Error removing document: ", error);
        });

    })

    // Remove Data
    $("body").on('click', '.removeData', function() {
        var id = $(this).attr('data-id');
        $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="' + id +
            '">');
    });
    $('.deleteRecord').on('click', function() {
        var values = $(".users-remove-record-model").serializeArray();
        var id = values[0].value;
        firebase.firestore().collection('VacSched').doc(id).remove();
        $('body').find('.users-remove-record-model').find("input").remove();
        $("#remove-modal").modal('hide');

    });
    $('.remove-data-from-delete-form').click(function() {
        $('body').find('.users-remove-record-model').find("input").remove();

    });
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection