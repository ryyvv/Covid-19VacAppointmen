@extends('layouts.app')

@section('content')
    <div class="containers">
        <div class="row ">

            <div class="col-md-12">

                <div class="card"
                    style="width: undefined;border-radius: 13px;box-shadow: 0 4px 4px 0 rgba(165, 165, 165, 0.2), 0 6px 20px 0 rgba(145, 145, 145, 0.19);">
                    <div class="card-body">

                        <h4 style="color:#08509c"><b>Patient Information</b></h4>
                        <span>Registered Patient</span>
                        <div class="row row-md-12" style="margin-top:4vh">
                            <div class="col col-md-12" style="display: flex;flex-direction: row-reverse;">
                                <select class="form-select" style="color:#007bff;border-color:#007bff;border-radius:5px"
                                    aria-label="Default select example" style="padding:3px 3pxl;border-radius:5px">
                                    <option style="padding:5px 5pxl;border-radius:5px" selected value="ascending">A-z
                                    </option>
                                    <option style="padding:5px 5pxl;border-radius:5px" value="descending">Z-a</option>
                                </select>
                                <p style="margin-right:10px;margin-bottom:0; margin-top:8px;font-weight:bold;color:#08509c">
                                    Sort By:</p>
                            </div>
                        </div>
                        <div style=" overflow: hidden; height: 80px;">
                            <table class="table table-sm"
                                style="margin-top:1.5vh;margin-bottom:0;height: 60px; overflow-y: auto;">
                                <caption>
                                    <div class="row row-md-12">
                                        <div class="col col-md-6">
                                            List of Patient
                                        </div>
                                        <div class="col col-md-6" style=" display: flex;flex-direction: row-reverse;">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <li class="page-item"><a class="page-link"
                                                            href="#">Previous</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">Next</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </caption>
                                <thead>
                                    <tr>
                                        <th style="color:#08509c" scope="col">First Name</th>
                                        <th style="color:#08509c" scope="col">Last Name</th>
                                        <th style="color:#08509c" scope="col">Middle Name</th>
                                        <th style="color:#08509c" scope="col">Barangay</th>
                                        <th style="color:#08509c" scope="col">Municipality</th>
                                        <th style="color:#08509c" scope="col">Region</th>
                                        <th style="color:#08509c" scope="col">Contact No.</th>
                                        <th style="color:#08509c;text-align: center">Action</th>
                                        {{-- <th style="color:#08509c" scope="col">Delete</th> --}}
                                    </tr>
                                </thead>
                                <tbody style="height:40px;overflow-y: scroll;">
                                    <tr>
                                        <td scope="row">Ryan James</td>
                                        <td>Pascual</td>
                                        <td>Jadraque</td>
                                        <td>Suyo</td>
                                        <td>Dingras</td>
                                        <td>I</td>
                                        <td>+639120329621</td>
                                        <td style="text-align: center">
                                            <ion-icon class="delete" name="trash-outline"></ion-icon>delete
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Ryan James</td>
                                        <td>Pascual</td>
                                        <td>Jadraque</td>
                                        <td>Suyo</td>
                                        <td>Dingras</td>
                                        <td>I</td>
                                        <td>+639120329621</td>
                                        <td style="text-align: center">
                                            <ion-icon class="delete" name="trash-outline"></ion-icon>delete
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Ryan James</td>
                                        <td>Pascual</td>
                                        <td>Jadraque</td>
                                        <td>Suyo</td>
                                        <td>Dingras</td>
                                        <td>I</td>
                                        <td>+639120329621</td>
                                        <td style="text-align: center">
                                            <ion-icon class="delete" name="trash-outline"></ion-icon>delete
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Ryan James</td>
                                        <td>Pascual</td>
                                        <td>Jadraque</td>
                                        <td>Suyo</td>
                                        <td>Dingras</td>
                                        <td>I</td>
                                        <td>+639120329621</td>
                                        <td style="text-align: center">
                                            <ion-icon class="delete" name="trash-outline"></ion-icon>delete
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Ryan James</td>
                                        <td>Pascual</td>
                                        <td>Jadraque</td>
                                        <td>Suyo</td>
                                        <td>Dingras</td>
                                        <td>I</td>
                                        <td>+639120329621</td>
                                        <td style="text-align: center">
                                            <ion-icon class="delete" name="trash-outline"></ion-icon>delete
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Ryan James</td>
                                        <td>Pascual</td>
                                        <td>Jadraque</td>
                                        <td>Suyo</td>
                                        <td>Dingras</td>
                                        <td>I</td>
                                        <td>+639120329621</td>
                                        <td style="text-align: center">
                                            <ion-icon class="delete" name="trash-outline"></ion-icon>delete
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Ryan James</td>
                                        <td>Pascual</td>
                                        <td>Jadraque</td>
                                        <td>Suyo</td>
                                        <td>Dingras</td>
                                        <td>I</td>
                                        <td>+639120329621</td>
                                        <td style="text-align: center">
                                            <ion-icon class="delete" name="trash-outline"></ion-icon>delete
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Ryan James</td>
                                        <td>Pascual</td>
                                        <td>Jadraque</td>
                                        <td>Suyo</td>
                                        <td>Dingras</td>
                                        <td>I</td>
                                        <td>+639120329621</td>
                                        <td style="text-align: center">
                                            <ion-icon class="delete" name="trash-outline"></ion-icon>delete
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Ryan James</td>
                                        <td>Pascual</td>
                                        <td>Jadraque</td>
                                        <td>Suyo</td>
                                        <td>Dingras</td>
                                        <td>I</td>
                                        <td>+639120329621</td>
                                        <td style="text-align: center">
                                            <ion-icon class="delete" name="trash-outline"></ion-icon>delete
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Ryan James</td>
                                        <td>Pascual</td>
                                        <td>Jadraque</td>
                                        <td>Suyo</td>
                                        <td>Dingras</td>
                                        <td>I</td>
                                        <td>+639120329621</td>
                                        <td style="text-align: center">
                                            <ion-icon class="delete" name="trash-outline"></ion-icon>delete
                                        </td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
