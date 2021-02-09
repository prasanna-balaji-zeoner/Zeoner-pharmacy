<?php
  $page_title = 'All Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $products = join_product_table();
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="add_product.php" class="btn btn-primary">Add New</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th> Product Name </th>
                <th class="text-center" style="width: 10%;"> Categorie </th>
                <th class="text-center" style="width: 10%;"> Instock </th>
                <th class="text-center" style="width: 10%;"> Buying Price </th>
                <th class="text-center" style="width: 10%;"> Saleing Price </th>
                <th class="text-center" style="width: 10%;"> Product Added </th>
                <th class="text-center" style="width: 10%;"> Expiry Date </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product):?>
                <?php if ($product['quantity'] < 500) {
                     ?>

              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td> <?php echo remove_junk($product['name']); ?></td>
                <td class="text-center" > <?php echo remove_junk($product['categorie']); ?></td>

                <td class="text-center" style="color:red;"> <?php echo remove_junk($product['quantity']);?><br>
                <div class="pull-right"><a href="add_product.php" class="btn btn-primary">Add Stock</a></div></td>
                
                <td class="text-center"> <?php echo remove_junk($product['buy_price']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['sale_price']); ?></td>
                <td class="text-center"> <?php echo read_date($product['date']); ?></td>
                <td class="text-center"> <?php echo $product['exp_date']; ?></td>
              </tr>
              <?php } 
              else {?>
               <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td> <?php echo remove_junk($product['name']); ?></td>
                <td class="text-center" > <?php echo remove_junk($product['categorie']); ?></td>
                <td class="text-center" > <?php echo remove_junk($product['quantity']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['buy_price']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['sale_price']); ?></td>
                <td class="text-center"> <?php echo read_date($product['date']); ?></td>
                <td class="text-center"> <?php echo $product['exp_date']; ?></td>
              </tr>
              <?php  
              }?>
             <?php endforeach; ?>
            </tbody>
          </tabel>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
