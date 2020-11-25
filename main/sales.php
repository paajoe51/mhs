<?php include 'header.php'; ?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head> 
<?php include('navfixed.php');?>
    <div class="container-fluid">
      <div class="row-fluid">
	   	
	
		<div class="contentheader">
			<i class="icon-money"></i> Sales
			</div>
			<ul class="breadcrumb">
			<a href="index.php"><li>Dashboard</li></a> /
			<li class="active">Sales</li>
			</ul>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>

	<?php
$position=$_SESSION['SESS_POSITION'];
if($position=='cashier') {
?>
<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">Cash</a>

<a href="../index.php">Logout</a>
<?php
}
if($position=='admin') {
?>
				<?php } ?>										
<form action="incoming.php" id="sale_form" method="post" >
											
	<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
	<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
	<input type="text" class="form-control" id="code-scan" placeholder="Enter Bar Code" style ="height:32px; margin-top:2px;" id="code_box" disabled/>	
	<select name="product" style="width:650px; "class="chzn-select" required>
	<option id="codescan"></option>
		<?php
		include('../connect.php');
		$result = $db->prepare("SELECT * FROM products");
			$result->bindParam(':userid', $res);
			$result->execute();
			for($i=0; $row = $result->fetch(); $i++){
		?>
			<option id="sale_result" value="<?php echo $row['product_id'];?>"><?php echo $row['product_code']; ?> - <?php echo $row['gen_name']; ?> - <?php echo $row['product_name']; ?> | Expires at: <?php echo $row['expiry_date']; ?> | <?php echo $row['bar_code']?></option>
		<?php
					}
				?>
	</select>
	<input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
	<input  class="hidden" type="number" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
	<input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
	<Button id ="add_btn" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" ><i class="icon-plus-sign icon-large"></i> Add</button>
</form>
<table class="table table-bordered" id="resultTable" data-responsive="table">
	<thead>
		<tr>
			<th>SN</th>
			<th> Product Name </th>
			<th> Generic Name </th>
			<th> Category / Description </th>
			<th> Price </th>
			<th> Qty </th>
			<th> Amount </th>
			<?php if($_SESSION['SESS_POSITION']=='admin') {?>
			<th> Profit </th>
			<?php } ?>
			<th> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				$id=$_GET['invoice'];
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
				$result->bindParam(':userid', $id);
				$result->execute();
				for($i=1; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $i?></td>
			<td hidden><?php echo $row['product']; ?></td>
			<td><?php echo $row['product_code']; ?></td>
			<td><?php echo $row['gen_name']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td>
			<?php
			$ppp=$row['price'];
			echo formatMoney($ppp, true);
			?>
			</td>
			<td><?php echo $row['qty']; ?></td>
			<td>
			<?php
			$dfdf=$row['amount'];
			echo formatMoney($dfdf, true);
			?>
			</td>
			
			<?php 
			if($_SESSION['SESS_POSITION']=='admin') { echo"<td>";
			$profit=$row['profit'];
			echo formatMoney($profit, true); echo"</td>";
			}?>
			
			<td width="90"><a href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a></td>
			</tr>
			<?php
				}
			?>
			<tr>
			<th> </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<td> Total Amount: </td>
			<?php if($_SESSION['SESS_POSITION']=='admin') {?>
			<td> Total Profit: </td>
			<?php } ?>
			<th>  </th>
		</tr>
			<tr>
				<th colspan="5"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
				<?php
				function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				$sdsd=$_GET['invoice'];
				$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(amount)'];
				echo formatMoney($fgfg, true);
				}
				?>
				</strong></td>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
			<?php if($_SESSION['SESS_POSITION']=='admin') {
				$resulta = $db->prepare("SELECT sum(profit) FROM sales_order WHERE invoice= :b");
				$resulta->bindParam(':b', $sdsd);
				$resulta->execute();
				for($i=0; $qwe = $resulta->fetch(); $i++){
				$asd=$qwe['sum(profit)'];
				echo formatMoney($asd, true);
				}
				}
				?>
		
				</td>
				<th></th>
			</tr>
		
	</tbody>
</table><br>
<a rel="facebox" href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $fgfg ?>&totalprof=<?php echo $asd ?>&cashier=<?php echo $_SESSION['SESS_FULL_NAME']?>"><button class="btn btn-success btn-large btn-block"><i class="icon icon-save icon-large"></i> SAVE</button></a>
<div class="clearfix"></div>
</div>
</div>
</body>
<?php include('footer.php');?>

<script>
	var barcode;
	
$(document).ready(function(){

	
	$( ".chzn-search input" ).focus();
	$(function () {
		$( '.chzn-search input' ).codeScanner();
		$('#code-scan').codeScanner();
	});

	$(document).on('keypress',function(e) {
			if(e.which == 13) {
				$( "#sale_result" ).select();
				$.post( "incoming.php", $( "#sale_form" ).serialize())
					.done(function( data ) {
						$(function(){
						$('table#resultTable').load(location.href + ' #resultTable');		
						}, 1000);
					});
				
			}
		});
});
</script>

</html>