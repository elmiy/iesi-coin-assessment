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
          <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#newSubjectModal">Add New Subject</a>
          <thead>
              <tr>
                  <th>No</th>
                  <th>Subject</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
    <?php $i = 1; ?>
                <?php foreach ($subject as $s) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                   <td><?= $s['subject']; ?></td>
                   <td>
                    <a href="<?= base_url('tables/subject_edit/').$s['id']; ?>" class="badge badge-success">Edit</a>
                       <a href="<?= base_url('tables/subject_delete/').$s['id']; ?>" class="badge badge-danger">Delete</a>
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
<div class="modal fade" id="newSubjectModal" tabindex="-1" role="dialog" aria-labelledby="newSubjectModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="newSubjectModalLabel">Add New Subject</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form action="<?= base_url('tables/subject'); ?>" method="post">
<div class="modal-body">
<div class="form-group">
  <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject Name">
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