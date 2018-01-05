
<?php 
			
$eMail = $_POST['eMail'];
$selectedSeats = $_POST['selectedSeats'];

if(empty($selectedSeats)==true)
{echo
	'<div class="errorDiv">
		You haven\'t selected any seats!
	</div>';
}
else if(empty($eMail)==true)
{echo
	'<div class="errorDiv">
		Please, enter your email addres!
	</div>';
}
else if (filter_var($eMail, FILTER_VALIDATE_EMAIL) == false)
{echo
	'<div class="errorDiv">
		Your email address is invalid!
	</div>';
}
else{
echo '
<div id="payment">
Your Email is: 
<b>'. $eMail.'</b>
<br>
<br>
You are purchasing seats: 
<b>'; 
$sum = 0;
foreach($selectedSeats as $seat) {
	echo $seat . ' ';
	$sum += 50;
}
echo '</b>
<br>
<br>
The amount you are going to pay is:
<b>'.
$sum
.' GEL </b>
<br>
<br>
If you confirm this information, you can proceed to checkout below:
<br>
<br>
	<!form action="/your-server-side-code" method="POST">
		 <script
		src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		data-key="pk_test_EIjMQliimuptQEBNLh5G6PVC"
		data-amount="'.($sum*100).'"
		data-name="Pilgrim tours"
		data-description="purchase seats"
		data-image="https://image.ibb.co/jSUbfF/logo2.jpg"
		data-currency="gel"
		data-email = "'. $eMail.'"
		>
		 </script>
	</form>
	
<br>
<br>
	<div id="prevButton" class="npButton">
							Previous
	</div>

	
<script type="text/javascript">
			
$(".npButton").on("click",function(){
$("#payment").hide("slide",{direction:"right"},300,function() 
{$(this).remove();
$("#booking").show("slide",{direction:"left"},300);
});

});
</script>
	
</div>

';}
?>