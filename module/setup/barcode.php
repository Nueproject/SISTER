<html>
<head>
<style>
p.inline {display: inline-block;}
span { font-size: 13px;}
</style>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
</head>
<body onload="window.print();">
	<div style="margin-left: 5%">
		<?php
		// $product = $_POST['product'];
		// $product_id = $_POST['product_id'];
		// $rate = $_POST['rate'];

        include '../../asset/barcode128.php';
		$angka = "201295";

			echo "<p class='inline'>".bar128(stripcslashes($angka))."</p>&nbsp&nbsp&nbsp&nbsp";
		

		?>
	</div>
</body>
</html>