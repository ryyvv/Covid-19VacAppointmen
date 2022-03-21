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
                                    <th style="color:#08509c" scope="col">Firstname</th>
                                    <th style="color:#08509c" scope="col">Lastname</th>
                                    <th style="color:#08509c" scope="col">Middlename</th>
                                    <th style="color:#08509c" scope="col">Address</th>
                                    <th style="color:#08509c" scope="col">Municipality</th>
                                    <th style="color:#08509c" scope="col">Region</th>
                                    <th style="color:#08509c" scope="col">Contac No.</th>
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection