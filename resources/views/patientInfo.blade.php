@extends('layouts.app')

@section('content')
<div class="containers">
    <div class="row ">

        <div class="col-md-12">

            <div class="card" style="width: undefined;border-radius: 13px;box-shadow: 0 4px 4px 0 rgba(165, 165, 165, 0.2), 0 6px 20px 0 rgba(145, 145, 145, 0.19);">
                <div class="card-body">

                    <h4 style="color:#08509c"><b>Patient Information</b></h4>
                    <span>Registered Patients</span>
                    <div class="row row-md-12" style="margin-top:4vh">
                        <div class="col col-md-6">
                            <!-- <button type="button" class="btn btn-outline-primary">
                                <b>
                                    <i class="bi bi-file-earmark-plus"></i>Add
                                </b>
                            </button> -->
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
                    <div style="height:360px;overflow-x:auto;overflow-y:auto;width: 100%">
                        <table class="table table-sm" style="margin-top:1.5vh;margin-bottom:0;">
                            <caption>
                                <div class="row row-md-12">
                                    <div class="col col-md-6">
                                    </div>
                                    <div class="col col-md-6" style=" display: flex;flex-direction: row-reverse;">
                                    </div>
                                </div>
                            </caption>
                            <thead>
                                <tr style="z-index: 5;top: 0; position: sticky;width: 100%!important;height: 8px; background-color:white">
                                    <th style="color:#08509c" scope="col">Firstname</th>
                                    <th style="color:#08509c" scope="col">Lastname</th>
                                    <th style="color:#08509c" scope="col">Middlename</th>
                                    <th style="color:#08509c" scope="col">Birthday</th>
                                    <th style="color:#08509c" scope="col">Gender</th>
                                    <th style="color:#08509c" scope="col">Barangay</th>
                                    <th style="color:#08509c" scope="col">Municipality</th>
                                    <th style="color:#08509c" scope="col">Province</th>
                                    <th style="color:#08509c" scope="col">Region</th>
                                    <th style="color:#08509c" scope="col">Email</th>
                                    <th style="color:#08509c" scope="col">Contact No.</th>
                                    <th style="color:#08509c" scope="col">Category</th>
                                </tr>
                            </thead>
                            <tbody id="pertbody">

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
            $('#pertbody').html('');
            db.collection('Users').orderBy('firstname', 'asc').get().then((snapshot) => {
                snapshot.docs.forEach(doc => {
                    renderDataPer(doc)
                })
            })
        } else {
            $('#pertbody').html('');
            db.collection('Users').orderBy('firstname', 'desc').get().then((snapshot) => {
                snapshot.docs.forEach(doc => {
                    renderDataPer(doc)
                })
            })
            // $('#pertbody').html('');
            // db.collection('Users').orderBy('firstname', 'desc').limit(15).get().then((snapshot) => {
            //     snapshot.docs.forEach(doc => {
            //         renderDataPer(doc)
            //     })
            // })
        }
    }


    // Get Data
    db.collection('Users').orderBy('firstname', 'asc').get().then((snapshot) => {
        snapshot.docs.forEach(doc => {
            renderDataPer(doc)
        })
    });

    const personinfo = document.querySelector('#pertbody');

    function renderDataPer(doc) {
        let tr = document.createElement('tr');
        let firstname = document.createElement('td');
        let lastname = document.createElement('td');
        let middlename = document.createElement('td');
        let birthday = document.createElement('td');
        let gender = document.createElement('td');
        let barangay = document.createElement('td');
        let municipality = document.createElement('td');
        let province = document.createElement('td');
        let region = document.createElement('td');
        let email = document.createElement('td');
        let contactno = document.createElement('td');
        let category = document.createElement('td');

        tr.setAttribute('data-id', doc.id);
        firstname.textContent = doc.data().firstname;
        lastname.textContent = doc.data().lastname;
        middlename.textContent = doc.data().middlename;
        var ndate = doc.data().birthdate;
        birthday.textContent = ndate.toDate().toDateString();
        gender.textContent = doc.data().gender;
        barangay.textContent = doc.data().barangay;
        municipality.textContent = doc.data().municipality;
        province.textContent = doc.data().province;
        region.textContent = doc.data().region;
        email.textContent = doc.data().email;
        contactno.textContent = doc.data().contact;
        category.textContent = doc.data().category;

        tr.appendChild(firstname);
        tr.appendChild(lastname);
        tr.appendChild(middlename);
        tr.appendChild(birthday);
        tr.appendChild(gender);
        tr.appendChild(barangay);
        tr.appendChild(municipality);
        tr.appendChild(province);
        tr.appendChild(region);
        tr.appendChild(email);
        tr.appendChild(contactno);
        tr.appendChild(category);

        personinfo.appendChild(tr);
    }
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection