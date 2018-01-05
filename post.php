<HTML>
	<head>
		<title>
			<?php
			
				if (isset($_GET['id']))
				{$id = preg_replace ('%^0-9%',' ',$_GET['id']);}
					
				include("../connection1.php");
					
				$query = 'SELECT title FROM tours WHERE id='. $id;
				$result = $conn ->query($query);
				mysqli_close($conn);
				
				while($tour = mysqli_fetch_array($result))
				{echo $tour['title'];}
			
			?>
		</title>
		<link rel="shortcut icon" type="image/x-icon" href="E/images/p.ico" />
		<link href="poststyle.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<div id="wrap">
			<?php
			
			if (isset($_GET['id']))
			{$id = preg_replace ('%^0-9%',' ',$_GET['id']);}
		
			include("../connection1.php");
		
			$query = 'SELECT mainImage, title FROM tours WHERE id='. $id;
			$result = $conn ->query($query);
			mysqli_close($conn);
			
			
			while($tour = mysqli_fetch_array($result))
			{echo '
			<div id="header">
			<img width="100%" height="100%" src="tour main images/' .$tour['mainImage']. '">
			<div id="tourTitle">
			</div>
			<div id="titleText">
			' .$tour['title']. '
			</div>
			</div>';}
			
			
			?>
			

			<div id="mainPage">
				<div id="buttonwrap">
					<div class="tabButton" id="tabButton1" data-num="1">
						About
					</div>
					<div class="tabButton" id="tabButton2" data-num="2">
						Tour plan
					</div>
					<div class="tabButton" id="tabButton3" data-num="3">
						Booking
					</div>
				</div>
				
				
					<?php
					
					include("menubar.php");
						echo '<div class="contentHolder" id="ch1">';
						if (isset($_GET['id']))
						{$id = preg_replace ('%^0-9%',' ',$_GET['id']);}
					
						include("../connection1.php");
					
						$query = 'SELECT * FROM tours WHERE id='. $id;
						$result = $conn ->query($query);
						mysqli_close($conn);
						
						
						while($tour = mysqli_fetch_array($result))
						{$thisTour = $tour['title'];
						echo '
						<div class="infoBox">
						' .$tour['about']. '
						</div>
						<div id="imgDisplay">
							<div id="background">
							</div>
							<img id="shownImg" src="">
							<div id="arr1">
							</div>
							<div id="arr2">
							</div>
							<div id="x">
							</div>
						</div>
						
						<div id="albumWrap">';
						
						if($tour['images'] != Null) {
						$images = $tour['images'];
						$images = preg_replace('/[^a-z0-9,\/\.]/','',$images);
						$images = preg_replace('/,\s+/',',',$images);
						$images = explode(',',$images);
						
						$i=1;
						foreach($images as $image)
						{
							echo '<img src="'.$image.'" class="albumImg" data-n="'.$i.'">';
							$i++;
						}}
						
						
						
						echo'
						</div>
						</div>
						<div class="contentHolder" id="ch2">
						<div id="map">
							<iframe src="'.$tour['map'].'" width="1000" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
						<div class="infoBox">
						' .$tour['tourPlan']. '
						</div>
						</div>
				';}?>
				
				<div class="contentHolder" id="ch3">
					<div id="booking">
						<div id="carView">
							<div class="takenSeat" id="driver">
							Driver
							</div>
							<div class="takenSeat" id="me">
							Me
							</div>
					<?php
							include("../connection1.php");
							$query = 'SELECT * FROM tickets_'.$thisTour.' LIMIT 16';
							$result = $conn ->query($query);
							mysqli_close($conn);
							
							while($seat = mysqli_fetch_array($result))
							{
								
								if($seat['status']==0)
								{echo '<div class="freeSeat" data-toggle="off" data-seatnum="'.$seat['id'].'">
										'.$seat['id'].'
										</div>';}
								else if($seat['status']==1)
								{echo '<div class="takenSeat" data-seatnum="'.$seat['id'].'">
										'.$seat['id'].'
										</div>';}
								if(in_array($seat['id'],array(3,5,8,11)))
								{
									echo '<div class="emptySpace">
										</div>';
								}
							}
							
					?>
						</div>
						<div id="legend">
							
							<div id="freeExample" class="example">
							</div>
							&nbsp &nbsp Available seat.
							<br>
							<br>
							<div id="takenExample" class="example">
							</div>
							&nbsp &nbsp Taken seat.
							<br>
							<br>
							<div id="chosenExample" class="example">
							</div>
							&nbsp &nbsp Chosen seat.
							
						</div>
						
						
						<form id="purchaseinfo" method="POST">
							Selected seats: <br>
							<input type="text" id="selectedSeats" name="selectedSeats" placeholder="No seats selected" readonly>
							<br> <br>
							E-mail: <br>
							<input type="text" id="eMail" name="eMail" placeholder="Input your e-mail here">	

							</form>
							
							<div id="nextButton" class="npButton">
							Next 
							</div>
							
							
	
					</div>
				</div>
				
				
				
				
				
			</div>
			<?php include("footer.php"); ?>
		</div>
		
			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
			<script type="text/javascript" src="postjs.js"></script>
	</body>
</HTML>

