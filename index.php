<!DOCTYPE html>
<html>
  <head>
    <title>Simple PHP Host Monitoring</title>
    <meta http-equiv="refresh" content="5">
    <link rel="stylesheet" href="style.css">
  </head>
<body>

<?php include 'hosts.php'; ?>

<div class="container">
  <h2>Server Monitoring</h2>
  <?php echo "<h2>".date("H:i:s")."</h2>"; ?>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">#</div>
      <div class="col col-2">Name</div>
      <div class="col col-3">Host</div>
      <div class="col col-4">Status</div>
    </li>
    <?php foreach ($hosts as $s => $k) { ?>
    <li class="table-row">
      <div class="col col-1" data-label="#"><?php echo $s; ?></div>
      <div class="col col-2" data-label="Name"><?php echo $k[0]; ?></div>
      <div class="col col-3" data-label="Host"><?php echo $k[1]; ?></div>
      <?php {
        if (exec("ping -c 1 '$k[1]'"))
          echo "<div class='col col-4' data-label='Status' style='font-weight:bold; color:green;'>Online</div>";
      else
          echo "<div class='col col-4' data-label='Status' style='font-weight:bold; color:red;'>Offline</div>";
      } ?>
    </li>
    <?php } ?>
  </ul>
</div>

</body>
</html>
