
<?php
		
		require_once ('DB/conf.php'); // ბაზასთან დაკავშირება
		$DELETE_PRODUCT = (int)$_GET['product_id'];
		$DELETE = 'DELETE FROM product WHERE product_id = :product_id';
		$statement = $PDO->prepare($DELETE);
		if ($statement->execute([':product_id' => $DELETE_PRODUCT])) {
			$DeleteMsg = 'მონაცემი წარმატებით წაიშალა';
			header("refresh:0; index.php");
		}
		?>


		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<div class="alert alert-success"  style="text-align: center;">
			<?php if(isset($DeleteMsg)) { ?>
				<?php echo $DeleteMsg; ?>
			<?php } ?>
		</div>