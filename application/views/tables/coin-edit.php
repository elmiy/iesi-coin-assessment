<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('tables/coin_update'); ?>" method="post">
            <input type="hidden" name="id" value="<?= $coin->id ?>">
            <div class="form-group">
                <label for="coin">Coin</label>
                <input type="text" class="form-control" id="coin" name="coin" value="<?= $coin->coin ?>">
                <?= form_error('coin', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="explanation">Explanation</label>
                <input type="text" class="form-control" id="explanation" name="explanation" value="<?= $coin->explanation ?>">
                <?= form_error('coin', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
                
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save Change</button>
                <a href="<?= base_url('tables/coin'); ?>"><div class="btn btn-danger">Cancel</</a>
            </div>
                </div>
            </form>

        </div>

</div>

</div>
<!-- /.container-fluid -->
  </div>
<!-- End of Main Content -->