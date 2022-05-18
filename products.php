<?php
include 'config.php'
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
	<div id="header">
		<h1 id="logo">Logo</h1>
		<nav>
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>
	</div>
	<div id="main">
		<div id="products">
		<?php foreach($products as $val){?>
			<div id = <?php echo $val['name'] ?> class ="product">
			<img src = <?php echo $val['img'] ?> >
			<h3 class="title"><a href="#"><?php echo $val['name']?></a></h3>
			<span><?php echo "Price:"." ".$val['price']?></span>
			<button class="add-to-cart" type="submit" name="submit" value="<?php echo $val['name'] ?>">Add To Cart</button>
			</div>
			<?php } ?>
		</div>
	</div>
	<div id="footer">
		<nav>
			<ul id="footer-links">
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Declaimers</a></li>
			</ul>
		</nav>
	</div>
	<div>
		<table id="prodTable" width="100%" bgcolor="grey">
			<tr width="100%">
				<th>Name</th>
				<th>Price</th>
				<th>Image</th>
			</tr>
			<tbody>	
				<tr width="100%"></tr>
				<td style="margin:auto; padding: left 10px;"></td>
			</tbody>

		</table>
	</div>
	<script>
		$(document).ready(function(){
			$('.add-to-cart').click(function(){
				$name = $(this).val();				
				$price = $(this).parent().find('span').text();
				$image = $(this).parent().find('img').attr('src');
				$.ajax({
			 url:'server.php',
			 type:'post',
			 data:{name: $name,
			       price: $price,
				   image: $image},
			 success:function(result){
				 $('#prodTable').append(result);
			 }
		 });
			});
		});
	</script>
</body>
</html>