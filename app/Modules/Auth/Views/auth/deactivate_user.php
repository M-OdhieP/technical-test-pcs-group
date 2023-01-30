<?= $this->extend(dashboard_view('_layouts')); ?>
<?= $this->section("content") ?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 p-0">
      <h2 class="mb-2 page-title"><?= $title ?></h2>
      <div class="row my-2">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-body">
              <?php echo form_open('auth/deactivate/' . $user->id); ?>
              <div class="mb-3">
                <div class="custom-control custom-radio">
                  <input type="radio" id="confirm_yes" name="confirm" value="yes" class="custom-control-input" checked>
                  <label class="custom-control-label" for="confirm_yes">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="confirm_no" name="confirm" value="no" class="custom-control-input">
                  <label class="custom-control-label" for="confirm_no">No</label>
                </div>
              </div>
              <?php echo form_hidden('id', $user->id); ?>

              <button type="submit" class="btn btn-primary">Update User</button>



              <?php echo form_close(); ?>

            </div>
          </div>
        </div>
      </div> <!-- end section -->
    </div> <!-- .col-12 -->
  </div> <!-- .row -->
</div> <!-- .container-fluid -->
<?= $this->endSection() ?>