
// firebase.initializeApp({
//     apiKey: "AIzaSyD594kQatzBHyUVVeXycIWx5tVjVoOkrOs",
//     authDomain: "rncovidsched.firebaseapp.com",
//     databaseURL: "https://rncovidsched-default-rtdb.firebaseio.com",
//     projectId: "rncovidsched",
//     storageBucket: "rncovidsched.appspot.com",
//     messagingSenderId: "793794700791",
//     appId: "1:793794700791:web:522c9072ed133333e6baf2"
// });
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
    let barangay = document.createElement('td');
    let municipality = document.createElement('td');
    let region = document.createElement('td');
    let contactno = document.createElement('td');

    tr.setAttribute('data-id', doc.id);
    firstname.textContent = doc.data().firstname;
    lastname.textContent = doc.data().lastname;
    middlename.textContent = doc.data().middlename;
    barangay.textContent = doc.data().barangay;
    municipality.textContent = doc.data().municipality;
    region.textContent = doc.data().region;
    contactno.textContent = doc.data().contactno;

    tr.appendChild(firstname);
    tr.appendChild(lastname);
    tr.appendChild(middlename);
    tr.appendChild(barangay);
    tr.appendChild(municipality);
    tr.appendChild(region);
    tr.appendChild(contactno);

    personinfo.appendChild(tr);
}