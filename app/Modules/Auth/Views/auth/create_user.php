<?= $this->extend(dashboard_view('_layouts')); ?>
<?php $validation = \Config\Services::validation(); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
      <div class="row justify-content-center">
            <div class="col-12 p-0">
                  <h2 class="mb-2 page-title">Create User</h2>
                  <div class="row my-2">
                        <!-- Small table -->
                        <div class="col-md-12">
                              <div class="card shadow">
                                    <div class="card-body">
                                          <form action="<?= base_url('auth/create_user') ?>" method="POST" enctype="multipart/form-data">
                                                <div class="form-row">
                                                      <div class="form-group col-md-6">
                                                            <label for="first_name">First Name</label>
                                                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?= $first_name['value']; ?>">
                                                            <?php autherror('first_name') ?>
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                            <label for="last_name">Last Name</label>
                                                            <input type="text" class="form-control" name="last_name" id="last_name" value="<?= $last_name['value']; ?>">
                                                            <?php autherror('last_name') ?>
                                                      </div>
                                                </div>
                                                <div class="form-row">
                                                      <div class="form-group col-md-4">
                                                            <label for="company">Company</label>
                                                            <input type="text" class="form-control" name="company" id="company" value="<?= $company['value']; ?>">
                                                            <?php autherror('company') ?>
                                                      </div>
                                                      <div class="form-group col-md-4">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" name="email" id="email" value="<?= $email['value']; ?>">
                                                            <?php autherror('email') ?>
                                                      </div>
                                                      <div class="form-group col-md-4">
                                                            <label for="phone">Phone</label>
                                                            <input type="text" class="form-control" name="phone" id="phone" value="<?= $phone['value']; ?>">
                                                            <?php autherror('phone') ?>
                                                      </div>
                                                </div>
                                                <div class="form-row">

                                                      <div class="form-group col-md-6">
                                                            <label for="password">Password</label>
                                                            <input type="password" class="form-control" name="password" id="password">
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                            <label for="password_confirm">Password Confirm</label>
                                                            <input type="password" class="form-control" name="password_confirm" id="password_confirm">
                                                      </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Create User</button>
                                          </form>

                                    </div>
                              </div>
                        </div>
                  </div> <!-- end section -->
            </div> <!-- .col-12 -->
      </div> <!-- .row -->
</div> <!-- .container-fluid -->
<?= $this->endSection(); ?>