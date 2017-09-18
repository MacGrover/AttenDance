<?php
if (isset($data)) {
    $pageinfo = array("Edit Uploaded File", "Edit Uploaded File Record", "", "SUL");
} else {
    $pageinfo = array("Import Leave User Balance File ", "Import Leave User Balance File", "", "SUL");
}
?>
@extends('layout.master')
@section('content')
@include('include.coreBarcum')
<div class="row">
    <div class="col-lg-12">
        <div class="cat__core__sortable" id="left-col">
            <section class="card" order-id="card-1">

                <div class="card-block">
                    <div class="row">
                        <div class="col-xl-4">
                            <!--Vertical Form Starts Here-->

                            <form name="LeaveUserBalance" enctype="multipart/form-data"  action="{{url('Settings/LeaveUserBalance/Add')}}" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="l30">Please Browse & Select Your Attendance File</label>
                                        <div class="col-lg-12">
                                            <input name="employee" type="file" class="dropify" data-height="300" />
                                        </div>

                                    </div>
                                </div>


                                <div class="form-actions">
                                    <button type="submit"  class="btn btn-primary">Upload Employee File</button>
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                </div>
                            </form>

                            <!--Vertical Form Ends Here-->
                        </div>

                        </section>


                    </div>
                </div>

        </div>
        @endsection
        @section('extraFooter')

        @include('include.coreKendo')
        <link rel="stylesheet" type="text/css" href="{{url('vendors/dropify/dist/css/dropify.min.css')}}">
        <script src="{{url('vendors/dropify/dist/js/dropify.min.js')}}"></script>
        <script>
$(function () {


    $('.dropify').dropify();




});
        </script>


        <script>
            $(function () {

                var processLogUrl = "<?= url('Leave/AutoAddLeaveBalance') ?>";


                setInterval(function () {
                    $.ajax({
                        method: "GET",
                        url: processLogUrl
                    })
                            .done(function (msg) {
                                console.log("Data Processed 1");
                            });
                }, 5000);

                var processLogUrls = "<?= url('Leave/AutoAddAnnualLeaveBalance') ?>";


                setInterval(function () {
                    $.ajax({
                        method: "GET",
                        url: processLogUrls
                    })
                            .done(function (msg) {
                                console.log("Data Processed 2");
                            });
                }, 10000);

                var processLogUrlss = "<?= url('Leave/AutoAddLWPLeaveBalance') ?>";


                setInterval(function () {
                    $.ajax({
                        method: "GET",
                        url: processLogUrlss
                    })
                            .done(function (msg) {
                                console.log("Data Processed 3");
                            });
                }, 20000);



                var WeekendHolidayLogProcess = "<?= url('WeekendHolidayLogProcess') ?>";



                $.ajax({
                    method: "GET",
                    url: WeekendHolidayLogProcess
                })
                        .done(function (msg) {
                            console.log("Weekend And Holiday Log Process");
                        });



            });
        </script>
        @endsection