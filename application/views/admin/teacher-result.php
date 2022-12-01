<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="form-group" method="post" >

<a href="<?php echo site_url('admin/teacherreport/') ?>" class="btn btn-dark">PDF Report</a>
</div>
<table class="table table-hover">
<thead>
  <tr>
    <th scope="col">No.</th>
    <th scope="col">Teacher's Name</th>
        <th scope="col">Subject</th>
        <th scope="col">Class</th>
        <th scope="col">Coin</th>
        <th scope="col">Total</th>
        
    </tr>
</thead>
<tbody>
  <tr>
  <?php $i = 1; ?>
  <?php foreach ($assessment as $a) : ?>
    <th scope="row"><?= $i; ?></th>
        <td><?= $a['name']; ?></td>
        <td><?= $a['subject'] ; ?></td>
        <td><?= $a['class']; ?></td>
        <td><?= $a['coin']; ?></td>
        <td><?= $a['total']; ?></td>
  </tr>
  <?php $i++; ?>
<?php endforeach; ?>
</tbody>
</table>
  
</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->
</div>
