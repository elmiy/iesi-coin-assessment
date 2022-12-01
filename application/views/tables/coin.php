<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

 <div class="row">
  <div class="col lg-6">
  <?php if(validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
        <?= validation_errors();?>
      </div>
    <?php endif; ?>
        <?= $this->session->flashdata('message'); ?>
  <div class="table-responsive">
      <table class="table table-hover">
          <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#newCoinModal">Add New Coin</a>
          <thead>
              <tr>
                  <th>No</th>
                  <th>Coin</th>
                  <th>Explanation</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <?php $i = 1; ?>
                <?php foreach ($coin as $c) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $c['coin']; ?></td>
                <td><?= $c['explanation']; ?></td>
                <td>
                    <a href="<?= base_url('tables/coin_edit/') . $c['id'];?>" class="badge badge-success">Edit</a>
                    <a href="<?= base_url('tables/deletecoin/') . $c['id'];?>" class="badge badge-danger">Delete</a>
                </td>
              </tr>
              <?php $i++; ?>
              <?php endforeach; ?>
          </tbody>
      </table>
  </div>

  </main>
</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newCoinModal" tabindex="-1" role="dialog" aria-labelledby="newCoinModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="newCoinModalLabel">Add New Coin</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form action="<?= base_url('tables/coin'); ?>" method="post">
<div class="modal-body">
<div class="form-group">
  <input type="text" class="form-control" id="coin" name="coin" placeholder="Coin Name">
</div>
<div class="form-group">
  <input type="text" class="form-control" id="explanation" name="explanation" placeholder="Explanation Name">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Add</button>
</div>
</form>
</div>
</div>
</div>