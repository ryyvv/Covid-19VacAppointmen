@extends('layouts.app')

@section('content')
<div class="containers">
    <div class="row ">

        <div class="col-md-12">

            <div class="card" style="width: undefined;border-radius: 13px;box-shadow: 0 4px 4px 0 rgba(165, 165, 165, 0.2), 0 6px 20px 0 rgba(145, 145, 145, 0.19);">
                <div class="card-body">
                    <!-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Appointments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav> -->

                    <div>
                        <p style="margin-right:10px;size:15px;margin-top:5px">Status: </p>
                        <h4 style="color:#08509c;"><b style="border:2px solid gray;padding:5px 10px"> Ongoing</b></h4>
                    </div>
                    <!-- Form -->
                    <div class="container">

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
        let a = document.createElement('a');
        let Patient = document.createElement('td');
        let email = document.createElement('td');
        let date = document.createElement('td');
        let Location = document.createElement('td');
        let appCode = document.createElement('td');
        let status = document.createElement('td');

        tr.setAttribute('data-id', doc.id);
        Patient.textContent = doc.data().firstname + '  ' + doc.data().middlename + '  ' + doc.data().lastname;
        email.textContent = doc.data().email;
        var ndate = doc.data().vacdate;
        date.textContent = ndate;
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