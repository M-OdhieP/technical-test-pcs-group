<?= $this->extend(dashboard_view('_layouts')); ?>
<?= $this->section("content") ?>
<div class="container-fluid">
      <div class="row justify-content-center">
            <div class="col-12 p-0">
                  <h2 class="mb-2 page-title">Change Password</h2>
                  <div class="row my-2">
                        <div class="col-md-12">
                              <div class="card shadow">
                                    <div class="card-body">
                                          <?php echo form_open('auth/change_password'); ?>
                                          <div class="form-row">
                                                <div class="form-group col-md">
                                                      <label for="old">Old Password</label>
                                                      <input type="password" class="form-control" name="old" id="old">
                                                      <?php autherror('old') ?>
                                                </div>
                                                <div class="form-group col-md">
                                                      <label for="new">New Password</label>
                                                      <input type="password" class="form-control" name="new" id="new">
                                                      <?php autherror('new') ?>
                                                </div>
                                                <div class="form-group col-md">
                                                      <label for="new_confirm">Confirm New Password</label>
                                                      <input type="password" class="form-control" name="new_confirm" id="new_confirm">
                                                      <?php autherror('new_confirm') ?>
                                                </div>
                                          </div>
                                          <button type="submit" class="btn btn-primary">Edit Password</button>
                                          <?php echo form_close(); ?>

                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<?= $this->endSection() ?>