<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?= $title; ?></title>
  <link rel='stylesheet' href='<?= base_url('assets/');?>dropdown/css.css'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'/>
  <link rel="stylesheet" href="<?= base_url('assets/');?>dropdown/style.css"/>

<!-- BUTTON STYLE -->
<style>

@font-face {
  font-family: Helvetica;
  src: url(assets/font/HelveticaNeueLight.ttf);
}

button {
  position: relative;
  display: inline-block;
  cursor: pointer;
  outline: none;
  border: 0;
  vertical-align: middle;
  text-decoration: none;
  background: transparent;
  padding: 0;
  font-size: 15px;
  font-family: helvetica;
}
button.learn-more {
  width: 12rem;
  height: auto;
}
button.learn-more .circle {
  -webkit-transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
  transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
  position: relative;
  display: block;
  margin: 0;
  width: 3rem;
  height: 3rem;
  background: #282936;
  border-radius: 1.625rem;
}
button.learn-more .circle .icon {
  -webkit-transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
  transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
  position: absolute;
  top: 0;
  bottom: 0;
  margin: auto;
  background: #fff;
}
button.learn-more .circle .icon.arrow {
  -webkit-transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
  transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
  left: 0.625rem;
  width: 1.125rem;
  height: 0.125rem;
  background: none;
}
button.learn-more .circle .icon.arrow::before {
  position: absolute;
  content: '';
  top: -0.25rem;
  right: 0.0625rem;
  width: 0.625rem;
  height: 0.625rem;
  border-top: 0.125rem solid #fff;
  border-right: 0.125rem solid #fff;
  -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
}
button.learn-more .button-text {
  -webkit-transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
  transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  padding: 0.75rem 0;
  margin: 0 0 0 1.85rem;
  color: #282936;
  font-weight: 700;
  line-height: 1.6;
  text-align: center;
  text-transform: uppercase;
}
button:hover .circle {
  width: 100%;
}
button:hover .circle .icon.arrow {
  background: #fff;
  -webkit-transform: translate(1rem, 0);
          transform: translate(1rem, 0);
}
button:hover .button-text {
  color: #fff;
}
</style>
<!-- END BUTTON STYLE -->
  
</head>

<body>

<?= $this->session->flashdata('message'); ?>

<form action="<?= base_url('main'); ?>" method="post">
  
  <div class="sel sel--black-panther">
  <select name="class_id" id="class_id" required>
    <option value="" disabled>Select Class</option>
    <?php foreach ($class as $c) : ?>
        <option value="<?= $c['id']; ?>"><?= $c['class']; ?></option>
    <?php endforeach; ?>
    
  </select>
  </div>

  <div class="sel sel--black-panther">
  <select name="user_id" id="user_id" required>
    <option value="" disabled>Select Teacher</option>
    <?php foreach ($teacher as $t) : ?>
        <option value="<?= $t['id']; ?>"><?= $t['name']; ?></option>
    <?php endforeach; ?>
  </select>
  </div>

<hr class="rule">

<div class="sel sel--superman">
  <select name="subject_id" id="subject_id" required>
    <option value="">Select Subject</option>
    <?php foreach ($subject as $s) : ?>
        <option value="<?= $s['id']; ?>"><?= $s['subject']; ?></option>
    <?php endforeach; ?>
  </select>
</div>

<div class="sel sel--superman">
  <select name="coin_id" id="coin_id" required>
    <option value="">Select Coin</option>
    <?php foreach ($coin as $c) : ?>
        <option value="<?= $c['id']; ?>"><?= $c['coin']; ?></option>
    <?php endforeach; ?>
  </select>
</div>

<hr class="rule">
<br>
<div class="sel--superman">
    <button class="learn-more js-open btn-open is-active" type="submit" rel="modal:open">
    <span class="circle" aria-hidden="true">
    <span class="icon arrow"></span>
    </span>
    <span class="button-text">Submit</span>
  </button>
</div>




</form>

<script src='<?= base_url('assets/');?>js/jquery.min.js'></script>
<script src="<?= base_url('assets/');?>dropdown/index.js"></script>

</body>
</html>