<?php

/* @var $this yii\web\View */

$this->title = 'Beranda | Event-Hub';
$year = date('Y');
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-user">
            <div class="text-center">
                <h2 class="text-warning" data-plugin="counterup">3</h2>
                <h5>Total Event</h5>
            </div>
        </div>
    </div>


    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-user">
            <div class="text-center">
                <h2 class="text-custom" data-plugin="counterup">400</h2>
                <h5>Total Organizer</h5>
            </div>
        </div>
    </div>
    <!-- end col -->


    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-user">
            <div class="text-center">
                <h2 class="text-success" data-plugin="counterup">800</h2>
                <h5>Total Pengguna <?= date('Y') ?></h5>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-user">
            <div class="text-center">
                <h2 class="text-danger" data-plugin="counterup">3000</h2>
                <h5>Total Unduhan Aplikasi <?= date('Y') ?></h5>
            </div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-lg-12">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-30">Selamat datang di Backend Event-Hub.</h4>
        </div>
    </div><!-- end col -->

</div>
<!-- end row -->

