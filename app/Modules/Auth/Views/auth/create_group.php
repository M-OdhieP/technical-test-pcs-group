<?= $this->extend(dashboard_view('_layouts')); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
      <div class="row justify-content-center">
            <div class="col-12 p-0">
                  <h2 class="mb-2 page-title">Create Group</h2>
                  <div class="row my-2">
                        <div class="col-md-12">
                              <div class="card shadow">
                                    <div class="card-body">
                                          <form action="<?= base_url('auth/create_group') ?>" method="POST" enctype="multipart/form-data">
                                                <div class="form-row">
                                                      <div class="form-group col-md-6">
                                                            <label for="group_name">Group Name</label>
                                                            <input type="text" class="form-control" name="group_name" id="group_name">
                                                            <?php autherror('group_name') ?>
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                            <label for="description">Description</label>
                                                            <input type="text" class="form-control" name="description" id="description">
                                                            <?php autherror('description') ?>
                                                      </div>
                                                </div>


                                                <button type="submit" class="btn btn-primary">Create Group</button>
                                          </form>

                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<?= $this->endSection(); ?>