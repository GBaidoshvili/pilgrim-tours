<HTML>
	<head>
		<title>
		 Pilgrim Tours
		</title>
		<link rel="shortcut icon" type="image/x-icon" href="E/images/p.ico" />
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
	</div>
	<div id="wrap">
		
		<?php include("header.php");
		
		include("menubar.php");
		
		include("../connection1.php");
		
		$query = 'SELECT * FROM tours';
		$result = $conn ->query($query);
		mysqli_close($conn);

		
		while($tour = mysqli_fetch_array($result))
		{
		echo
			'
			<div class="tour">
			<a href="post.php?id='. $tour['id'] .'">
				<img class="tourimage" src="tour main images/' .$tour['mainImage']. '" >
				<div class="tourtitle">
					<p class="titletext">' . $tour['title'].  '</p>
				</div>
								
				<div class="tourinfo">
					<p class="infotext">'
					. $tour['description'].'
					</p>
				</div>
			</a>
			</div>
			';
		}
		
		include("footer.php");
		?>
		
		
	</div>
			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
			<script type="text/javascript" src="js.js"></script>
		
		
	</body>
</HTML>