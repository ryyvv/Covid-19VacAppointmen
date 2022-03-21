// // Initialize Firebase
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

// function sorts() {

//     var select = document.getElementById('sort').value;
//     if (select == "asc") {
//         $('#apptbodby').html('');
//         db.collection('Users').orderBy('date', 'asc').get().then((snapshot) => {
//             snapshot.docs.forEach(doc => {
//                 renderDataPer(doc)
//             })
//         })
//     } else {
//         $('#apptbodby').html('');
//         db.collection('Users').orderBy('date', 'desc').get().then((snapshot) => {
//             snapshot.docs.forEach(doc => {
//                 renderDataPer(doc)
//             })
//         })
//     }
// }


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
    Location.textContent = doc.id;
    appCode.textContent = doc.data().Location;
    status.textContent = doc.data().status;

    tr.appendChild(Patient);
    tr.appendChild(email);
    tr.appendChild(date);
    tr.appendChild(Location);
    tr.appendChild(appCode);
    tr.appendChild(status);

    appScheds.appendChild(tr);
}