<?= $this->extend(dashboard_view('_layouts')); ?>
<?= $this->section("content") ?>

<div class="container-fluid">
      <div class="row justify-content-center">
            <div class="col-12 p-0">
                  <h2 class="mb-2 page-title">Create Group</h2>
                  <div class="row my-2">
                        <div class="col-md-12">
                              <div class="card shadow">
                                    <div class="card-body">
                                          <?php echo form_open(current_url()); ?>
                                          <div class="form-row">
                                                <div class="form-group col-md-6">
                                                      <label for="group_name">Group Name</label>
                                                      <input type="text" class="form-control" name="group_name" id="group_name" value="<?= $group_name['value']; ?>">
                                                      <?php autherror('group_name') ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                      <label for="group_description">Description</label>
                                                      <input type="text" class="form-control" name="group_description" id="group_description" value="<?= $group_description['value']; ?>">
                                                      <?php autherror('group_description') ?>
                                                </div>
                                          </div>
                                          <button type="submit" class="btn btn-primary">Edit Group</button>
                                          <?php echo form_close(); ?>

                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<?= $message; ?>
<?= $this->endSection() ?>