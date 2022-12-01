<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <table class="table table-hover">
          <div class="form-group">
            <a href="<?php echo site_url('result/printresult/') ?>" class="btn btn-dark">PDF Report</a>
          </div>
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


<!-- End of Main Content