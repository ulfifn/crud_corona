<?php $this->load->view('komponen/head'); ?>
 

<!-- Log in -->
  
<body class="bg-gradient-primary">

  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
            	<div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                  </div>

                  <form class="user" method="post" action="<?= base_url('Corona/register') ?>">

                    <div class="form-group">
                      <input type="Name" class="form-control form-control-user" id="nama" name="nama" placeholder="Enter Full Name...">
                      <small class="text-danger"><?= form_error('nama'); ?></small>
                    </div>

                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address...">
                      <small class="text-danger"><?= form_error('email'); ?></small>
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                      <small class="text-danger"><?= form_error('password1'); ?></small>
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password2" name="password2"  placeholder="Repeat Password">
                    </div>


                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Create Account
                    </button>


                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="/corona/login/">Sudah Punya Akun?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

 <?php 

$this->load->view('komponen/footer');

 ?>