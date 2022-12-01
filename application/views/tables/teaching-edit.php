<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('tables/teaching_update'); ?>" method="post">
            <input type="hidden" name="id" value="<?= $teaching_distribution->teaching_id ?>">
                <div class="form-group">
                        <label for="title">Teacher's Name</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="">Select Teacher</option>
                            <?php foreach ($name as $n) : ?>
                            <option <?php if($n['id'] == $teaching_distribution->user_id){ echo "Selected"; } ?> value="<?= $n['id']; ?>"><?= $n['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
               <div class="form-group">
                        <label for="title">Subject</label>
                        <select name="subject_id" id="subject_id" class="form-control">
                            <option value="">Select Subject</option>
                            <?php foreach ($subject as $s) : ?>
                            <option <?php if($s['id'] == $teaching_distribution->subject_id){ echo "Selected"; } ?> value="<?= $s['id']; ?>"><?= $s['subject']; ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save Change</button>
                    <a href="<?= base_url('tables/subject'); ?>"><div class="btn  btn-danger">Cancel</div></a>
                </div>
                
            </form>
        </div>

</div>
</div>
<!-- /.container-fluid -->
  </div>
<!-- End of Main Content -->