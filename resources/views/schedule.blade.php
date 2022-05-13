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
                    <div style="height:360px;overflow:hidden;overflow-y:auto;width: 100%">
                        <!-- <div class="table-responsive"> -->
                        <table class=" table table-sm" style="margin-top:1.5vh;margin-bottom:0;">
                            <caption>
                                <div class="row row-md-12">
                                    <div class="col col-md-6">
                                        <!-- List of Patients -->
                                    </div>
                                    <div class="col col-md-6" style=" display: flex;flex-direction: row-reverse;">
                                    </div>
                                </div>
                            </caption>
                            <thead>
                                <tr>
                                    <th style="color:#08509c" scope="col">Image</th>
                                    <th style="color:#08509c" scope="col">Date and Time</th>
                                    <th style="color:#08509c" scope="col">Vaccination Site</th>
                                    <th style="color:#08509c" scope="col">Vaccination Brand</th>
                                    <th style="color:#08509c" scope="col">Status</th>
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
                            List of Vaccines
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Create Model -->
<form id="add" action="" method="Post" class="users-update-record-model form-horizontal">
    <div id="create-modal" data-backdrop="static" data-keyboard="false" class="modal" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Add</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body" id="createBody">
                    <div class="mb-3">
                        <label for="imageFormControlInput" class="form-label">Upload image</label>
                        <input type="file" name="imageURL" id="images" class="form-control" accept="image/x-png,image/jpeg" placeholder="@image" required />
                    </div>
                    <div class="mb-3">
                        <label for="dateFormControlInput" class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" id="dateFormControlInput" placeholder="@date" required>
                    </div>
                    <div class="mb-3">
                        <label for="vacSiteleFormControlInput" class="form-label">Vaccination Site</label>
                        <input type="text" name="vacLocation" class="form-control" id="vacSiteleFormControlInput" placeholder="@Location" required>
                    </div>
                    <div class="mb-3">
                        <label for="brandFormControlInput" class="form-label">Vaccination Brand</label>
                        <select name="vacBrand" class="form-control" aria-label="Select vaccine brand" required>
                            <option selected>-- Select --</option>
                            <option value="AstraZeneca">AstraZeneca</option>
                            <option value="J&J">J&J</option>
                            <option value="Moderna">Moderna</option>
                            <option value="Pfizer">Pfizer</option>
                            <option value="Sinovac">Sinovac</option>
                            <option value="Sputnik">Sputnik</option>
                        </select>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="brandFormControlInput" class="form-label">Vaccination Brand</label>
                        <input type="text" name="vacBrand" class="form-control" id="brandFormControlInput" placeholder="@Brand" required>
                    </div> -->
                    <div class="mb-3">
                        <label for="brandFormControlInput" class="form-label">Vaccination Brand</label>
                        <select name="guardianstat" class="form-control" aria-label="Select vaccine brand" required>
                            <option selected>-- Select --</option>
                            <option value="18 years old above">18 years old above</option>
                            <option value="18 years old below">18 years old below</option>
                        </select>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="brandFormControlInput" class="form-label">Guardian(Stat)</label>
                        <input type="text" name="guardianstat" class="form-control" id="brandFormControlInput" placeholder="@stat" required>
                    </div> -->

                    <div class="mb-3">
                        <label for="exampleFormControlInput" class="form-label">Slot</label>
                        <input type="text" name="vacSlot" class="form-control" id="SlotFormControlInput" placeholder="@1-1000" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel
                    </button>
                    <button type="submit" id="addSubmit" onsubmit="submitadd" class="btn btn-success updateCustomer">Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- update Model -->
<form id="updatesss" action="" method="" class="users-update-record-model form-horizontal">
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
                    <button type="button" id='submitupdate' class="btn btn-success ">Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Delete Model -->
<form id='delete' action="" method="POST" class="users-remove-record-model">
    <div id="remove-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Delete</h4>
                    <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body" id="deletesched">
                    <p>Do you want to delete this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close
                    </button>
                    <button type="button" id='deletedata' class="btn btn-danger waves-effect waves-light deleteRecord">Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- add message -->
<div id="addMes" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="justify-content: center;text-align:center;align-items:center;padding:40px 40px!important;height:260px!important">
                <br><br>
                <img src="{{ URL::asset('../../img/checked.png') }}" alt="profile Pic" height="90" width="90">
                <h5 style="margin-top:15px">Record added successfully!</h5>
            </div>
        </div>
    </div>
</div>

<!-- Edit message -->
<div id="editMes" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="justify-content: center;text-align:center;align-items:center;padding:40px 40px!important;height:260px!important">
                <br><br>
                <img src="{{ URL::asset('../../img/checked.png') }}" alt="profile Pic" height="90" width="90">
                <h5 style="margin-top:15px">Record updated successfully!</h5>
            </div>
        </div>
    </div>
</div>

<!-- deleteMessage -->
<div id="deleteMes" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="justify-content: center;text-align:center;align-items:center;padding:40px 40px!important;height:260px!important">
                <img src="{{ URL::asset('../../img/checked.png') }}" alt="profile Pic" height="90" width="90">
                <h5 style="margin-top:15px">Record deleted successfully!</h5>
            </div>
        </div>
    </div>
</div>



{{-- Firebase Tasks --}}
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<!-- <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script> -->
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>

<!-- <script src="https://www.gstatic.com/firebasejs/6.5.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.5.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.5.0/firebase-messaging.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.5.0/firebase-storage.js"></script> -->


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
    var storageRef = firebase.storage().ref();

    function sorts() {

        var select = document.getElementById('sort').value;
        if (select == "asc") {
            $('#schedtbody').html('');
            db.collection('VacSched').orderBy('vacdate', 'asc').get().then((snapshot) => {
                snapshot.docs.forEach(doc => {
                    renderDataPer(doc)
                })
            });
        } else {
            $('#schedtbody').html('');
            db.collection('VacSched').orderBy('vacdate', 'desc').get().then((snapshot) => {
                snapshot.docs.forEach(doc => {
                    renderDataPer(doc)
                })
            });
        }
    }


    // Get Data
    db.collection('VacSched').orderBy('vacdate', 'asc').get().then((snapshot) => {
        snapshot.docs.forEach(doc => {
            renderDataPer(doc)
        })
    });


    // firestorage.ref(imageURL).get()

    // Appenddata to table
    const schedInfo = document.querySelector('#schedtbody');

    //render
    function renderDataPer(doc) {
        let tr = document.createElement('tr');
        let vacimage = document.createElement('td');
        let image = document.createElement('img');
        let vacdate = document.createElement('td');
        let vacLocation = document.createElement('td');
        let vacBrand = document.createElement('td');
        let guardianstat = document.createElement('td');
        let vacSlot = document.createElement('td');
        let edit = document.createElement('td');
        let del = document.createElement('td');
        let btnedit = document.createElement('button');
        let btndel = document.createElement('button');
        let txtedit = document.createElement('label');
        let iconEdit = document.createElement('ion-icon');
        let txtdel = document.createElement('label');
        let iconDel = document.createElement('ion-icon');


        // let dtes = doc.data().vacdate.toDate().toDateString();
        tr.setAttribute('data-id', doc.id);
        image.setAttribute('src', doc.data().imageURL);
        image.setAttribute('style', 'width: 100px');
        image.setAttribute('alt', 'Thumbnail');
        vacdate.textContent = doc.data().vacdate + ", 8-5PM";
        vacLocation.textContent = doc.data().vacLocation;
        vacBrand.textContent = doc.data().vacBrand;
        vacSlot.textContent = doc.data().vacSlot;
        guardianstat.textContent = doc.data().guardianstat;
        btnedit.setAttribute('data-id', doc.id);
        iconEdit.setAttribute('name', 'create-outline');
        iconDel.setAttribute('name', 'trash-outline');
        btnedit.setAttribute('data-toggle', 'modal');
        btnedit.setAttribute('data-target', '#update-modal');
        btnedit.setAttribute('class', 'btn btn-outline-primary update-data');
        btnedit.setAttribute('style', 'text-alin:center');
        btndel.setAttribute('data-id', doc.id);
        btndel.setAttribute('data-toggle', 'modal');
        btndel.setAttribute('data-target', '#remove-modal');
        btndel.setAttribute('class', 'btn btn-outline-danger removeData');

        tr.appendChild(vacimage);
        vacimage.appendChild(image);
        tr.appendChild(vacdate);
        tr.appendChild(vacLocation);
        tr.appendChild(vacBrand);
        tr.appendChild(guardianstat);
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

    //Add Data Form
    const addsched = document.querySelector('#add');
    addsched.addEventListener('submit', (e) => {
        e.preventDefault();
        var values = $("#add").serializeArray();
        var vacdate = values[0].value;
        var vacLocation = values[1].value;
        var vacBrand = values[2].value;
        var guardianstat = values[3].value;
        var vacSlot = values[4].value;

        const file = document.querySelector('#images').files[0]
        const name = file.name;
        const metadata = {
            contentType: file.type
        };
        const task = storageRef.child(name).put(file, metadata);


        // Uploads the file to Firebase Storage.
        task.then((snapshot) => {
                console.log('Img')
                // You can also put the creation of Firestore Document here.
                // (If you want it to create the document before getting the download URL.)

                // Calls the `getDownloadURL()` method.
                snapshot.ref.getDownloadURL()
                    .then((url) => {
                        // You can put this either here or before getting download URL.
                        db.collection('VacSched').add({
                            imageURL: url,
                            vacdate: vacdate,
                            vacLocation: vacLocation,
                            vacBrand: vacBrand,
                            guardianstat: guardianstat,
                            vacSlot: vacSlot,
                            imageName: name,
                        }).then(() => {
                            console.log('Success')

                        }).catch((error) => {
                            console.error(error)
                        })
                        aMes()
                        location.reload()
                    })
            })
            .catch((error) => {
                // Logs error if there's an error uploading of file.
                console.log(error)
            })
    })

    $('#addSubmit').click(function() {
        $('#create-modal').fadeOut(300, function() {
            $('.modal').removeClass('in');
            $('.modal').attr("aria-hidden", "true");
            $('.modal').css("display", "none");
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
        })
    });


    function aMes() {
        setTimeout(function() {
            $('#addMes').modal();
        }, 500);
    }

    function eMes() {
        setTimeout(function() {
            $('#editMes').modal();
        }, 500);
    }

    function dMes() {
        setTimeout(function() {
            $('#deleteMes').modal();
        }, 500);
    }

    // update Data
    $('body').on('click', '.update-data', function() {
        let updateID = $(this).attr('data-id');
        $('#updateBody').html('');
        db.collection('VacSched').doc(updateID).get().then((doc) => {
            renderDataUp(doc.data(), updateID)

        });
    })
    const schedUpdate = document.querySelector('#updateBody');

    function renderDataUp(doc, ID) {
        let div = document.createElement('div');
        let div12 = document.createElement('div');
        let div1 = document.createElement('div');
        let div2 = document.createElement('div');
        let div3 = document.createElement('div');
        let div4 = document.createElement('div');
        let div5 = document.createElement('div');
        let div6 = document.createElement('div');
        let input1 = document.createElement('input');
        let input2 = document.createElement('input');
        let imageslabel = document.createElement('label');
        let imagesinput = document.createElement('input');
        let datelabel = document.createElement('label');
        let dateinput = document.createElement('input');
        let vacLocationlabel = document.createElement('label');
        let vacLocationinput = document.createElement('input');
        let vacBrandlabel = document.createElement('label');
        let selectbrand = document.createElement('select');
        let brandopt = document.createElement('option');
        let AstraZeneca = document.createElement('option');
        var JnJ = document.createElement('option');
        let Moderna = document.createElement('option');
        let Pfizer = document.createElement('option');
        let Sinovac = document.createElement('option');
        let Sputnik = document.createElement('option');
        // let vacBrandinput = document.createElement('input');
        let vacguardianlabel = document.createElement('label');
        let selectguard = document.createElement('select');
        let guardopt = document.createElement('option');
        let guardopt1 = document.createElement('option');
        let guardopt2 = document.createElement('option');
        // let vacguardianinput = document.createElement('input');
        let vacSlotlabel = document.createElement('label');
        let vacSlotinput = document.createElement('input');

        div12.setAttribute('class', 'mb-3');
        div1.setAttribute('class', 'mb-3');
        div2.setAttribute('class', 'mb-3');
        div3.setAttribute('class', 'mb-3');
        div4.setAttribute('class', 'mb-3');
        div5.setAttribute('class', 'mb-3');
        div6.setAttribute('class', 'mb-3');


        input1.setAttribute('value', ID);
        input1.setAttribute('type', 'hidden');
        input1.setAttribute('name', 'hidden1');

        input2.setAttribute('value', doc.imageURL);
        input2.setAttribute('type', 'hidden');
        input2.setAttribute('name', 'hidden2');

        imageslabel.setAttribute('for', ' imageFormControlInput');
        imageslabel.setAttribute('class', 'form-label');
        imageslabel.textContent = 'Image';
        imagesinput.setAttribute('required', '');
        imagesinput.setAttribute('id', 'images');
        imagesinput.setAttribute('type', 'file');
        imagesinput.setAttribute('name', 'image');
        imagesinput.setAttribute('placeholder', doc.imageURL);
        imagesinput.setAttribute('class', 'form-control');
        imagesinput.setAttribute('id', 'imageFormControlInput');
        imagesinput.setAttribute('value', doc.imageURL);



        datelabel.setAttribute('for', ' dateFormControlInput');
        datelabel.setAttribute('class', 'form-label');
        datelabel.textContent = 'Date';
        dateinput.setAttribute('type', 'date');
        dateinput.setAttribute('name', 'vacdate');
        dateinput.setAttribute('class', 'form-control');
        dateinput.setAttribute('id', 'dateFormControlInput');
        dateinput.setAttribute('value', doc.vacdate);

        vacLocationlabel.setAttribute('for', ' vacSiteleFormControlInput');
        vacLocationlabel.setAttribute('class', 'form-label');
        vacLocationlabel.textContent = 'Vaccination Site';
        vacLocationinput.setAttribute('type', 'text');
        vacLocationinput.setAttribute('name', 'vacLocation');
        vacLocationinput.setAttribute('class', 'form-control');
        vacLocationinput.setAttribute('id', 'vacSiteleFormControlInput');
        vacLocationinput.setAttribute('value', doc.vacLocation);

        vacBrandlabel.setAttribute('for', ' brandFormControlInput');
        vacBrandlabel.setAttribute('class', 'form-label');
        vacBrandlabel.textContent = 'Vaccination Brand';
        selectbrand.setAttribute('type', 'text');
        selectbrand.setAttribute('name', 'vacBrand');
        selectbrand.setAttribute('class', 'form-control');
        selectbrand.setAttribute('id', 'brandFormControlInput');
        selectbrand.setAttribute('value', doc.vacBrand);
        brandopt.textContent = '-- Select --';
        AstraZeneca.textContent = 'AstraZeneca';
        AstraZeneca.setAttribute('value', 'AstraZeneca');
        JnJ.textContent = 'J&J';
        JnJ.setAttribute('value', 'JnJ');
        Moderna.textContent = 'Moderna';
        Moderna.setAttribute('value', 'Moderna');
        Pfizer.textContent = 'Pfizer';
        Pfizer.setAttribute('value', 'Pfizer');
        Sinovac.textContent = 'Sinovac';
        Sinovac.setAttribute('value', 'Sinovac');
        Sputnik.textContent = 'Sputnik';
        Sputnik.setAttribute('value', 'Sputnik');

        if ('AstraZeneca' == doc.vacBrand) {
            AstraZeneca.setAttribute('selected', 'selected');
        } else if ('JnJ' == doc.vacBrand) {
            JnJ.setAttribute('selected', 'selected');
        } else if ('Moderna' == doc.vacBrand) {
            Moderna.setAttribute('selected', 'selected');
        } else if ('Pfizer' == doc.vacBrand) {
            Pfizer.setAttribute('selected', 'selected');
        } else if ('Sinovac' == doc.vacBrand) {
            Sinovac.setAttribute('selected', 'selected');
        } else if ('Sputnik' == doc.vacBrand) {
            Sputnik.setAttribute('selected', 'selected');
        } else {
            brandopt.textContent = '-- Select --';
        }

        selectbrand.add(brandopt)
        selectbrand.add(AstraZeneca)
        selectbrand.add(JnJ)
        selectbrand.add(Moderna)
        selectbrand.add(Pfizer)
        selectbrand.add(Sinovac)
        selectbrand.add(Sputnik)

        vacguardianlabel.setAttribute('for', ' guardianFormControlInput');
        vacguardianlabel.setAttribute('class', 'form-label');
        vacguardianlabel.textContent = 'Age Range';
        selectguard.setAttribute('name', 'guardianstat');
        selectguard.setAttribute('class', 'form-control');
        selectguard.setAttribute('id', 'guardianFormControlInput');
        selectguard.setAttribute('selected', doc.guardianstat);
        guardopt.textContent = '-- Select --';
        guardopt1.textContent = '18 years old above';
        guardopt1.setAttribute('value', '18 years old above');
        guardopt2.textContent = '18 years old below';
        guardopt2.setAttribute('value', '18 years old below');
        if ('18 years old above' == doc.guardianstat) {
            guardopt1.setAttribute('selected', 'selected');
        } else {
            guardopt2.setAttribute('selected', 'selected');
        }
        selectguard.add(guardopt)
        selectguard.add(guardopt1)
        selectguard.add(guardopt2)

        vacSlotlabel.setAttribute('for', ' SlotFormControlInput');
        vacSlotlabel.setAttribute('class', 'form-label');
        vacSlotlabel.textContent = 'Slot';
        vacSlotinput.setAttribute('type', 'text');
        vacSlotinput.setAttribute('name', 'vacSlot');
        vacSlotinput.setAttribute('class', 'form-control');
        vacSlotinput.setAttribute('id', 'SlotFormControlInput');
        vacSlotinput.setAttribute('value', doc.vacSlot);

        div12.appendChild(imageslabel);
        div12.appendChild(imagesinput);
        div2.appendChild(datelabel);
        div2.appendChild(dateinput);
        div3.appendChild(vacLocationlabel);
        div3.appendChild(vacLocationinput);
        div4.appendChild(vacBrandlabel);
        div4.appendChild(selectbrand);
        div5.appendChild(vacguardianlabel);
        div5.appendChild(selectguard);
        div6.appendChild(vacSlotlabel);
        div6.appendChild(vacSlotinput);

        div.appendChild(input1);
        div.appendChild(input2);
        div.appendChild(div12);
        div.appendChild(div2);
        div.appendChild(div3);
        div.appendChild(div4);
        div.appendChild(div5);
        div.appendChild(div6);


        schedUpdate.appendChild(div);
    }

    function reloads() {
        setTimeout("location.reload(true);", 1);
    }

    const upsched = document.querySelector('#submitupdate');
    upsched.addEventListener('click', (e) => {
        e.preventDefault();
        var values = $("#updatesss").serializeArray();
        var hidden1 = values[0].value;
        var hidden2 = values[1].value;
        var vacdate = values[2].value;
        var location = values[3].value;
        var brand = values[4].value;
        var guardianstat = values[5].value;
        var vacSlot = values[6].value;

        const file = document.querySelector('#imageFormControlInput').files[0];
        const name = document.querySelector('#imageFormControlInput').name;
        const metadata = {
            contentType: document.querySelector('#imageFormControlInput').type
        };
        const task = storageRef.child(name).put(file);
        task.then((snapshot) => {
                snapshot.ref.getDownloadURL()
                    .then((url) => {
                        db.collection('VacSched').doc(hidden1).set({
                            imageURL: url,
                            vacdate: vacdate,
                            vacLocation: location,
                            vacBrand: brand,
                            guardianstat: guardianstat,
                            vacSlot: vacSlot,
                            imageName: hidden2,
                        }).then(() => {
                            console.log('Success')

                        }).catch((error) => {
                            console.error(error)
                        })
                        eMes()
                        location.reload()

                    })
            })
            .catch((error) => {
                console.log(error)
            })


    })

    $('#submitupdate').click(function() {
        $('#update-modal').fadeOut(300, function() {
            $('.modal').removeClass('in');
            $('.modal').attr("aria-hidden", "true");
            $('.modal').css("display", "none");
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
        })
    });




    // Delete data
    $('body').on('click', '.removeData', function() {
        let deleteID = $(this).attr('data-id');
        $('#updateBody').html('');
        db.collection('VacSched').doc(deleteID).get().then((doc) => {
            renderDatadel(doc.data(), deleteID)

        });
    })
    const scheddelete = document.querySelector('#deletesched');

    function renderDatadel(doc, ID) {
        let input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('value', ID);
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'hiddenID');

        scheddelete.appendChild(input);
    }


    const Delsched = document.querySelector('#deletedata');
    Delsched.addEventListener('click', (e) => {
        e.preventDefault();
        var values2 = $("#delete").serializeArray();
        var hiddenID = values2[0].value;
        db.collection('VacSched').doc(hiddenID).delete().then(() => {
            dMes()
            reloads()
        })

    })

    $('#deletedata').click(function() {
        $('#remove-modal').fadeOut(300, function() {
            $('.modal').removeClass('in');
            $('.modal').attr("aria-hidden", "true");
            $('.modal').css("display", "none");
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
        })
    });
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection