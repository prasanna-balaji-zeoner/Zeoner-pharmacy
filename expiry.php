<?php
  $page_title = 'Expiry Products';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$expiry = join_product_table();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Expired Products</span>
          </strong>
          <div class="pull-right">
            <a href="add_sale.php" class="btn btn-primary">Add sale</a>
          </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th> Product name </th>
                <th class="text-center" style="width: 15%;"> Quantity</th>
                <th class="text-center" style="width: 15%;"> Buy Price </th>
                <th class="text-center" style="width: 15%;"> Expired date</th>
             </tr>
            </thead>
           <tbody>

             <?php foreach ($expiry as $exp):?>
              <?php if ($exp['exp_date'] < date('Y-m-d')) {?>
             <tr>
               <td class="text-center"><?php echo count_id();?></td>
               <td><?php echo remove_junk($exp['name']); ?></td>
               <td class="text-center"><?php echo (int)$exp['quantity']; ?></td>
               <td class="text-center"><?php echo remove_junk($exp['buy_price']); ?></td>
               <td class="text-center"><?php echo $exp['exp_date']; ?></td>
             </tr>
             <?php }?>
             <?php endforeach;?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
