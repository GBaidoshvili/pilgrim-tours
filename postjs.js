$(document).ready(function(){

$(".tabButton").on('click',function()
										{
											var num = parseInt($(this).attr('data-num'));
											$("#ch" + num).css("display","block");
											$(this).css({"backgroundColor":"#f2f2f2",
														"color":"black",
														"opacity":"1",})
											
											for(i=1; i<=3; i++){
											if(num != i)
											{$("#tabButton"+i).css({"backgroundColor":"black",
																  "color":"white",
																  "opacity":".8",});
											$("#ch"+i).css("display","none");}}
										});
								
function marginalize () {
	var winHeight = parseInt($("#imgDisplay").css("height"));
	var imgHeight = parseInt($("#shownImg").css("height"));
	var margin = (winHeight-imgHeight)/2;
	$("#shownImg").css("margin-top", margin);}

function appear () {	
	var source = $(this).attr("src");
	nowOpen = parseInt($(this).attr("data-n"));
	$("#shownImg").attr("src", source);
	$("#imgDisplay").show('fade', 300);	
	$(".menubar").hide('slide',{direction: 'up'},100);
	marginalize();}
	
function disappear() {
	$("#imgDisplay").hide('fade', 300);
	$(".menubar").show('slide',{direction: 'up'},100);}
	
var nowOpen;

var albImgCount = $("#albumWrap img").length;

function goLeft() {
	if(nowOpen != 1)
	{
	nowOpen = nowOpen-1;
	}else
	{nowOpen = albImgCount}
	var previousSrc = $("*[data-n="+(nowOpen)+"]").attr("src");
	$("#shownImg").attr("src",previousSrc);
	marginalize();}
	
function goRight() {
	if(nowOpen != albImgCount)
	{
	nowOpen = nowOpen+1;
	}else
	{nowOpen = 1}
	var previousSrc = $("*[data-n="+(nowOpen)+"]").attr("src");
	$("#shownImg").attr("src",previousSrc);
	marginalize();}

$(".albumImg").on('click', appear);

$("#background").on('click',disappear);

$("#x").on('click',disappear);

$("#arr1").on("click",goLeft);

$("#arr2").on("click",goRight);


document.onkeydown = function(event){
	var keyCode = event.keyCode;
	console.log(keyCode);
	if(keyCode==37 &&  $("#imgDisplay").css("display") != "none")
	{goLeft()}
	else if (keyCode==39 && $("#imgDisplay").css("display") != "none")
	{goRight()}
	else if (keyCode==27 && $("#imgDisplay").css("display") != "none")
	{disappear()}
};

var selectedSeats = new Array;

$(".freeSeat").on('click',function(){
	if($(this).attr("data-toggle") == 'off')
	{$(this).css({"backgroundColor":"red"});
	$(this).attr("data-toggle","on");
	selectedSeats.push(parseInt($(this).attr("data-seatnum")));
	selectedSeats.sort(function(x,y){return x-y});
;}
	else if ($(this).attr("data-toggle") == 'on')
	{$(this).css({"backgroundColor":"#3083ff"});
	$(this).attr("data-toggle","off");
	var index = selectedSeats.indexOf(parseInt($(this).attr("data-seatnum")));
	selectedSeats.splice(index,1)
;}

	$("#selectedSeats").attr("value", selectedSeats);
});


$('#nextButton').on('click',function(){
	var input = $('#eMail').val();
	$.post("payment.php",{"eMail":input, "selectedSeats":selectedSeats},function(data)
		{
			$('.errorDiv').remove();
			$('#ch3').append(data);
			if ($('.errorDiv').length > 0)
			{$('.errorDiv').show("fade",200).delay(5000).hide("fade",200);}
			else{
			$('#booking').hide('slide',{direction:'left'},300,function(){
			$('#payment').show('slide',{direction:'right'},300);
			});}
			
		}

	);
});



});

