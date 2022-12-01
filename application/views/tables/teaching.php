<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



<div class="row">
    <div class="col-lg">
    <?php if(validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
        <?= validation_errors();?>
      </div>
    <?php endif; ?>

    <?= $this->session->flashdata('message'); ?>


        <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#newTeachingModal">Add New Teaching Distribution</a>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Teacher's Name</th>
        <th scope="col">Subject</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($teaching as $t) : ?>
          <tr>
            <th scope="row"><?= $i; ?></th>
            <td><?= $t['name']; ?></td>
            <td><?= $t['subject']; ?></td>
            <td>
                <a href="<?= base_url('tables/teaching_edit/').$t['id']; ?>" class="badge badge-success" class="badge badge-success">Edit</a>
                <a href="<?= base_url('tables/teaching_delete/') . $t['id'];?>" class="badge badge-danger">Delete</a>
            </td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->


<!-- Modal -->
<div class="modal fade" id="newTeachingModal" tabindex="-1" role="dialog" aria-labelledby="newTeachingModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="newTeachingModalLabel">Add New Teaching Distribution</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<form action="<?= base_url('tables/teaching'); ?>" method="post">
<div class="modal-body">

<div class="form-group">
<select name="user_id" id="user_id" class="form-control">
  <option value="">Select Teacher</option>
  <?php foreach ($name as $n) : ?>
    <option value="<?= $n['id']; ?>"><?= $n['name']; ?></option>
  <?php endforeach; ?>
</select>
</div>
<div class="form-group">
<select name="subject_id" id="subject_id" class="form-control">
  <option value="">Select Subject</option>
  <?php foreach ($subject as $s) : ?>
    <option value="<?= $s['id']; ?>"><?= $s['subject']; ?></option>
  <?php endforeach; ?>
</select>
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