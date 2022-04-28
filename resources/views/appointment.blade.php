@extends('layouts.app')

@section('content')
<div class="containers">
    <div class="row ">

        <div class="col-md-12">

            <div class="card" style="width: undefined;border-radius: 13px;box-shadow: 0 4px 4px 0 rgba(165, 165, 165, 0.2), 0 6px 20px 0 rgba(145, 145, 145, 0.19);">
                <div class="card-body">

                    <h4 style="color:#08509c"><b>All Appointments</b></h4>
                    <span>Modification</span>
                    <div style="height:360px;overflow-x:hidden;overflow-y:auto;width: 100%">
                        <table class="table table-sm" style="margin-top:1.5vh;margin-bottom:0;">
                            <caption>
                                <div class="row row-md-12">
                                    <div class="col col-md-6">
                                        <!-- List of Appointments -->
                                    </div>
                                    <div class="col col-md-6" style=" display: flex;flex-direction: row-reverse;">
                                    </div>
                                </div>
                            </caption>
                            <thead>
                                <tr>
                                    <th style="color:#08509c" scope="col">Patient</th>
                                    <th style="color:#08509c" scope="col">Email</th>
                                    <th style="color:#08509c" scope="col">Date</th>
                                    <th style="color:#08509c" scope="col">Vaccination Site</th>
                                    <th style="color:#08509c" scope="col">Appointment Code</th>
                                    <th style="color:#08509c" scope="col">Status</th>
                                    <!-- <th style="color:#08509c;text-align: center" colspan="2">Action</th>
                                    <th style="color:#08509c" scope="col">Delete</th> -->
                                </tr>
                            </thead>
                            <tbody id="apptbodby">
                        </table>
                    </div>
                    <div class="row">
                        <div class="card-body">
                            List of Appointments
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- Firebase Tasks --}}
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
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

    // Get Data
    db.collection('Users').orderBy('firstname', 'asc').get().then((snapshot) => {
        snapshot.docs.forEach(doc => {
            renderDataPer(doc)
        })
    });

    const appScheds = document.querySelector('#apptbodby');

    function renderDataPer(doc) {
        let tr = document.createElement('tr');
        let Patient = document.createElement('td');
        let email = document.createElement('td');
        let date = document.createElement('td');
        let Location = document.createElement('td');
        let appCode = document.createElement('td');
        let status = document.createElement('td');

        tr.setAttribute('data-id', doc.id);
        Patient.textContent = doc.data().firstname + '  ' + doc.data().middlename + '  ' + doc.data().lastname;
        email.textContent = doc.data().email;
        let dtes = new Date().toLocaleDateString('en-us', {
            day: "numeric",
            month: "short"
        });
        doc.data.date = dtes;
        date.textContent = dtes + ", 8-5PM";
        Location.textContent = doc.data().vaclocation;
        appCode.textContent = doc.id;
        status.textContent = doc.data().status;

        tr.appendChild(Patient);
        tr.appendChild(email);
        tr.appendChild(date);
        tr.appendChild(Location);
        tr.appendChild(appCode);
        tr.appendChild(status);

        appScheds.appendChild(tr);
    }
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection