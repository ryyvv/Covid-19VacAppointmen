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


// Appenddata to table
const schedInfo = document.querySelector('#schedtbody');

//render
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
    // btnedit.textContent = "Edit";
    btnedit.setAttribute('data-toggle', 'modal');
    btnedit.setAttribute('data-target', '#update-modal');
    btnedit.setAttribute('class', 'btn btn-outline-primary update-data');
    btnedit.setAttribute('style', 'text-alin:center');
    btndel.setAttribute('data-id', doc.id);
    // btndel.textContent = "Delete";
    btndel.setAttribute('data-toggle', 'modal');
    btndel.setAttribute('data-target', '#remove-modal');
    btndel.setAttribute('class', 'btn btn-outline-danger removeData');

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

//Add Data Form
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
        aMes()
        console.log('ID:', docs.id)
        location.reload()
    })

})

$('#addSubmit').click(function () {
    $('#create-modal').fadeOut(300, function () {
        $('.modal').removeClass('in');
        $('.modal').attr("aria-hidden", "true");
        $('.modal').css("display", "none");
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open');
    })
});


function aMes() {
    setTimeout(function () {
        $('#addMes').modal();
    }, 500);
}

function eMes() {
    setTimeout(function () {
        $('#editMes').modal();
    }, 500);
}

function dMes() {
    setTimeout(function () {
        $('#deleteMes').modal();
    }, 500);
}

// update Data
$('body').on('click', '.update-data', function () {
    let updateID = $(this).attr('data-id');
    $('#updateBody').html('');
    db.collection('VacSched').doc(updateID).get().then((doc) => {
        renderDataUp(doc.data(), updateID)

    });
})
const schedUpdate = document.querySelector('#updateBody');

function renderDataUp(doc, ID) {
    let div = document.createElement('div');
    let div1 = document.createElement('div');
    let div2 = document.createElement('div');
    let div3 = document.createElement('div');
    let div4 = document.createElement('div');
    let div5 = document.createElement('div');
    let input = document.createElement('input');
    let datelabel = document.createElement('label');
    let dateinput = document.createElement('input');
    let vacLocationlabel = document.createElement('label');
    let vacLocationinput = document.createElement('input');
    let vacBrandlabel = document.createElement('label');
    let vacBrandinput = document.createElement('input');
    let vacSlotlabel = document.createElement('label');
    let vacSlotinput = document.createElement('input');

    div1.setAttribute('class', 'mb-3');
    div2.setAttribute('class', 'mb-3');
    div3.setAttribute('class', 'mb-3');
    div4.setAttribute('class', 'mb-3');
    div5.setAttribute('class', 'mb-3');

    input.setAttribute('type', 'hidden');
    input.setAttribute('value', ID);
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'hidden');
    datelabel.setAttribute('for', ' dateFormControlInput');
    datelabel.setAttribute('class', 'form-label');
    datelabel.textContent = 'Date';
    dateinput.setAttribute('type', 'date');
    dateinput.setAttribute('name', 'date');
    dateinput.setAttribute('class', 'form-control');
    dateinput.setAttribute('id', 'dateFormControlInput');
    dateinput.setAttribute('value', doc.date);

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
    vacBrandinput.setAttribute('type', 'text');
    vacBrandinput.setAttribute('name', 'vacBrand');
    vacBrandinput.setAttribute('class', 'form-control');
    vacBrandinput.setAttribute('id', 'brandFormControlInput');
    vacBrandinput.setAttribute('value', doc.vacBrand);

    vacSlotlabel.setAttribute('for', ' SlotFormControlInput');
    vacSlotlabel.setAttribute('class', 'form-label');
    vacSlotlabel.textContent = 'Slot';
    vacSlotinput.setAttribute('type', 'text');
    vacSlotinput.setAttribute('name', 'vacSlot');
    vacSlotinput.setAttribute('class', 'form-control');
    vacSlotinput.setAttribute('id', 'SlotFormControlInput');
    vacSlotinput.setAttribute('value', doc.vacSlot);


    div2.appendChild(datelabel);
    div2.appendChild(dateinput);
    div3.appendChild(vacLocationlabel);
    div3.appendChild(vacLocationinput);
    div4.appendChild(vacBrandlabel);
    div4.appendChild(vacBrandinput);
    div5.appendChild(vacSlotlabel);
    div5.appendChild(vacSlotinput);

    div.appendChild(input);
    div.appendChild(div2);
    div.appendChild(div3);
    div.appendChild(div4);
    div.appendChild(div5);


    schedUpdate.appendChild(div);
}

function reloads() {
    // location.reload()
    setTimeout("location.reload(true);", 1);
}

const upsched = document.querySelector('#submitupdate');
upsched.addEventListener('click', (e) => {
    e.preventDefault();
    var values2 = $("#updatesss").serializeArray();
    var hidden = values2[0].value;
    var dates = values2[1].value;
    var location = values2[2].value;
    var brand = values2[3].value;
    var slot = values2[4].value;

    db.collection('VacSched').doc(hidden).set({
        date: dates,
        vacLocation: location,
        vacBrand: brand,
        vacSlot: slot
    }).then((docs) => {
        eMes()
        reloads()
        console.log('ID:', hidden)
    })

})

$('#submitupdate').click(function () {
    $('#update-modal').fadeOut(300, function () {
        $('.modal').removeClass('in');
        $('.modal').attr("aria-hidden", "true");
        $('.modal').css("display", "none");
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open');
    })
});




// Delete data
$('body').on('click', '.removeData', function () {
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

$('#deletedata').click(function () {
    $('#remove-modal').fadeOut(300, function () {
        $('.modal').removeClass('in');
        $('.modal').attr("aria-hidden", "true");
        $('.modal').css("display", "none");
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open');
    })
});