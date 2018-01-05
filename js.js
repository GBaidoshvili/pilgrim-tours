$(document).ready(function(){
			
						var interval;
						var counter = 1;
						var lastCounter = 0;
				
				$('#sliderpoint'+counter).css({backgroundImage: 'url(E/images/sliderpointa.png)'});
				
				
				$("#slide1").show("fade",800)
				

				var slideNumber = $("#slider img").size();
				
				function startSlider () {interval = setInterval(function(){
											
											$("#slide"+counter).hide("fade",{direction:"left"},800);
											lastCounter = counter;
											if(counter==slideNumber){counter = 1;}
											else{counter = counter+1;}
											$("#slide"+counter).show("fade",{direction:"right"},800);
											$('#sliderpoint'+counter).css({backgroundImage: 'url(E/images/sliderpointa.png)'});
											$('#sliderpoint'+counter).siblings().css({backgroundImage: 'url(E/images/sliderpointp.png)'});
											},6800);}
				
				startSlider();
				function pauseSlider() {clearInterval(interval);}
				
				$(".slide").on("mouseover", pauseSlider).on("mouseleave", startSlider);
				
						$('#arrowleft').click(function() {
							if ($('#slide' + lastCounter).is(":visible")) {
								return;
							}

							
							pauseSlider();
							$('#slide' + counter).hide("slide", { direction: "right" }, 800);
							lastCounter = counter;
							if (counter == 1) {
								counter = slideNumber;
							} else {
								counter = counter - 1;
							}
							$('#slide' + counter).show("slide", { direction: "left" }, 800);
							$('#sliderpoint'+counter).css({backgroundImage: 'url(E/images/sliderpointa.png)'});
							$('#sliderpoint'+counter).siblings().css({backgroundImage: 'url(E/images/sliderpointp.png)'});
							startSlider();
						});

						$('#arrowright').click(function() {
							if ($('#slide' + lastCounter).is(":visible")) {
								return;
							}

							
							pauseSlider();
							$('#slide' + counter).hide("slide", { direction: "left" }, 800);
							lastCounter = counter;
							if (counter == slideNumber) {
								counter = 1;
							} else {
								counter = counter + 1;
							}
							$('#slide' + counter).show("slide", { direction: "right" }, 800);
							$('#sliderpoint'+counter).css({backgroundImage: 'url(E/images/sliderpointa.png)'});
							$('#sliderpoint'+counter).siblings().css({backgroundImage: 'url(E/images/sliderpointp.png)'});
							startSlider();
						});
																
						
						$('.sliderpoint').hover(			

										function pointHover() { var num = parseInt($(this).attr('data-num'));
										if(num != counter) {$(this).css({backgroundImage: 'url(E/images/sliderpointh.png)'})}},
										function () { var num = parseInt($(this).attr('data-num'));
										if(num != counter) {$(this).css({backgroundImage: 'url(E/images/sliderpointp.png)'})}});
					
							
				$('.sliderpoint').on('click', function () { var num = parseInt($(this).attr('data-num'));
															if (counter != num) {
															if ($('#slide' + lastCounter).is(":visible")) {return;}
															pauseSlider();
															$('#slide'+ counter).hide("fade",800);
															lastCounter = counter;
															counter = num;
															$('#slide'+ counter).show("fade",800);
															startSlider();
															$(this).css({backgroundImage: 'url(E/images/sliderpointa.png)'});
															$(this).siblings().css({backgroundImage: 'url(E/images/sliderpointp.png)'});
															}});
				
	
	var menubar = $(".menubar");
	var wrap = $(window);

wrap.scroll(function(){
	
	var scrollP = wrap.scrollTop();
	
	if(scrollP>460){
		menubar.css("position","fixed");
		menubar.css("top","0");
		$(".dummy").css("opacity","1");
		$(".category").css("opacity","1");
		$("#logo2").css("opacity","1");
		
	}
	else{
		menubar.css("position","absolute");
		menubar.css("top","460");
		$(".dummy").css("opacity",".8");
		$(".category").css("opacity",".8");
		$("#logo2").css("opacity","0");
	}
	
});
  

				
				
				});