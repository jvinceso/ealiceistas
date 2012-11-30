
$(document).ready(function (){
	var browserId = $.browser.version.split('.');
	if($.browser.webkit){
		$('body').addClass('browserChrome');
		$.browser.safari = false;
	}else if($.browser.opera) $('body').addClass('browserOpera');
	else if($.browser.mozilla){
		$('body').addClass('browserMozilla');
		$('body').addClass('browserMozilla' + browserId[0]);
	}else if($.browser.msie){
		$('body').addClass('browserIE');
		$('body').addClass('ie' + browserId[0]);
		isIE = true;
	}
	
	var base_url = "http://scifi.openfilmpod.com/";
	var this_image_path = "http://images.openfilmpod.com/";
	var adInterval = 240000;
	var overMore = false;
	var overDD = false;
	var ddIn = false;
	var nT = false;
	var mI;
	var menuInterval = 500;
	var thumbsWidth = parseInt($('#pods').css('width'));
	var thumbContWidth = parseInt($('#pod-slider').css('width'));
	var imgSrc = this_image_path + "sci-fi_open_film_V2_Background.jpg";
	
	var catTop;

//	if(cV) catTop = parseInt($('#categories-cont').css('top')) + $('#categories-cont').height();
//	else catTop = parseInt($('#header-cont').css('top')) + $('#header-cont').height();
//	$('#bg').css({'top': catTop});
//	
//	rotateBanners(true);
	
	window.fbAsyncInit = function() {
		var commentScroll = $('#comments-scroll'),
		comWidth = $('#comments').width() + 2,
		contHeight = 0,
		commentHeight = 72,
		bottomHeight = 145,
		base_url = "http://scifi.openfilmpod.com/admin/cp/";	
	};
	
	$('#comments').css({'min-height': ($('#about-pod').height() + 255) + 'px'});
	
	if($('#video-info-scroll').length > 0) $('#video-info-scroll').tinyscrollbar();
	
	$('.right-content').find('.item-list-scroll').each(function(){
		var thisScroll = $(this),
		thisHeight = $(thisScroll).height(),
		totalHeight = 0;
		
		setTimeout(function(){
			$(thisScroll).find('#item-list .item').each(function(){
				totalHeight += $(this).height();
			});
			
			$(thisScroll).tinyscrollbar();
			$(thisScroll).find('.scrollbar').hide();
			
			if(totalHeight > thisHeight){
				$(thisScroll).addClass('hasSB');
				$(thisScroll).tinyscrollbar_update();
				$(thisScroll).find('.scrollbar').fadeTo(500, 1);
				setTimeout(function(){
					$(thisScroll).tinyscrollbar_update();	
				}, 1000);
			}else $(thisScroll).find('.viewport').css({'width': '100%'});
		}, 1000);
	});
	
	$('#player-image').hide();
	
	$('.item-list-scroll').filter(':first').addClass('current');
	if($('#tab-cont').length > 0){
		$("#tab-cont").tabs(".item-list-scroll", {
			effect: 'fade',
			fadeInSpeed: 1000,
			fadeOutSpeed: 0
		});
	}else $('.item-list-scroll').fadeTo(500, 1);	
	
	if($('html').find('.collapse').length > 0){
		var initCollapse = $('html').find('.collapse')[0],
		initParent = $(initCollapse).parents('.item-list-scroll');
		
		if($(initParent).hasClass('current')){
			var rightPar = $(initParent).parents('.right-content'),
			vidCont = $(rightPar).prev();
			$(rightPar).addClass('collapse');
			$(vidCont).addClass('fullSize');
		}
	}
	
	$('#pod-slider').css({'overflow': 'hidden'});
//        alert('ffff')
	$('#mp-slider').mpScroll({speed: 0.05});	
	
	$("#categories #more").mouseenter(function(){
		$('#drop-down').slideDown(200);
		overMore = ddIn = true;
	}).mouseleave(function(){
		overMore = false;
		mI = setTimeout(closeMenu, menuInterval);
	});
	
	$("#drop-down").mouseenter(function(){
		overDD = true;
	}).mouseleave(function(){
		overDD = false;
		mI = setTimeout(closeMenu, menuInterval);
	});
		
	$('.item').click(function(){
		var thisItem = $(this),
		id = Number($(thisItem).find('.id').html()),
		mF = false;
		console.log("Curent: " + vids[curIndex]);
		if(vids[curIndex]){
			for(var i = 0; i < vids[curIndex].length; i++){
				console.log(vids[curIndex][i].id, id);
				if(vids[curIndex][i].id == id){
					v = i;
					mF = true;
					break;
				}
			}	
		}
		if(!mF) vE = true;
		else vE = false;
		isClicked = true;
		
		getFlashMovie("videoplayer").itemClicked();
	});
	
	if($('#tab-cont').length > 0){
		var tabs = $("#tab-cont").data('tabs'),
		thisCont = $('#tab-cont'),
		thisParent = $(thisCont).parent(),
		thiswidth = thisCont.width(),
		parWidth = thisParent.width(),
		movementZone = 100,
		speed = 0.15,
		isAnimating = false;
		
		if(thiswidth > parWidth){
			var maxTravel = parWidth - thiswidth,
			midPoint = parWidth / 2,
			animTime = Math.abs(maxTravel) / speed;
			$(thisCont).mouseenter(function(e){
				var mouseX = 0,
				mouseY = 0,
				parentOffset = $(this).parent().offset();
				
				$(thisParent).mousemove();
				$(thisParent).mousemove(function(e){
					mouseX = e.pageX - parentOffset.left;
					mouseY = e.pageY - parentOffset.top;
					var curPos = parseInt($(thisCont).css('left'));
					if(mouseX < movementZone){
						if(curPos !== 0 && !isAnimating){
							isAnimating = true;
							$(thisCont).animate({'left': '0px'}, animTime, "linear", function(){
								isAnimating = false;
							});
						}
					}else if(mouseX > parWidth - movementZone){
						if(curPos !== Math.abs(maxTravel) && !isAnimating){
							isAnimating = true;
							$(thisCont).animate({'left': maxTravel}, animTime, "linear", function(){
								isAnimating = false;
							});
						}
					}else if(isAnimating){
						$(thisCont).stop();
						isAnimating = false;
					}
				});
				
			}).mouseleave(function(){
				$(thisCont).stop();
			});
		}
		
		tabs.onClick(function(e, index){
			var curPane = tabs.getCurrentPane();
			if($(curPane).hasClass('hasSB')){
				$(curPane).tinyscrollbar_update();	
				$(curPane).find('.scrollbar').show();
			}
		});
	
		tabs.onBeforeClick(function(e, index){
			var panes = tabs.getPanes();
			var curPane = panes[index];
			$('.right-content').find('.item-list-scroll').each(function(){$(this).removeClass('current');});
			$(curPane).addClass('current');
			if(curIndex !== index) {
				curIndex = index;
				var rightPar = $(curPane).parents('.right-content'),
				vidCont = $(rightPar).prev();
				if($(curPane).find('.item').length > 0){
					$(rightPar).removeClass('collapse');
					$(vidCont).removeClass('fullSize');
					emptyTab = false;
					$(curPane).find('.item').filter(':first').click();
				}else{
					$(rightPar).addClass('collapse');
					$(vidCont).addClass('fullSize');
					emptyTab = true;
					showImg(staticImg, "static");
					getFlashMovie("videoplayer").itemClicked();
				}
			}
		});
	}

	if($('#category').length > 0){
		$('#categories').find('#category').each(function(){
			var thisObj = $(this),
			overDD = false,
			overCat = false,
			catDDIn = false,
			catDD = $(thisObj).find('#cat-dd'),
			cI,
			cInt = 100;
			$(thisObj).mouseenter(function(){
				$(catDD).slideDown();
				overCat = catDDIn = true;
			}).mouseleave(function(){
				overCat = false;
				cI = setInterval(closeDD, cInt);
			});

			$(catDD).mouseenter(function(){
				overDD = true;		
			}).mouseleave(function(){
				overDD = false;
				cI = setInterval(closeDD, cInt);
			});

			function closeDD(){
				if(!overCat && !overDD && catDDIn) $(catDD).slideUp();
			}	
		})
	}

	function loadImage(){
		var newImg = new Image();
		newImg.onload = function() 
		{
			$('#bg').fadeTo(500, 0, function()
			{
				$(this).append('<img src="'+ imgSrc + '" alt="Category Background" /></a>');
		 		centerImg();
				$(this).fadeTo(500, 1, function(){centerImg();});	
			});
		};
		newImg.src = imgSrc; 	}
	
	function centerImg(){
		var vpWidth = $(window).width(),
		img = $('#bg').find('img'),
		imgWidth = $(img).width();
		
		if($('#bg').find('img').length > 0){
			var newMargin = Number(vpWidth - imgWidth) / 2;
			$('#bg img').css({'marginLeft' : newMargin + 'px'});
		}
	}
	function closeMenu(){
		if(!overDD && !overMore && ddIn) $('#drop-down').slideUp(200);
	}
	function rotateBanners(f){
		if(f){
			if($('.banner-ad').length > 0) $('.banner-ad').loadBanner('728', 728, 90);
			if($('.square-ad').length > 0) $('.square-ad').loadBanner('300', '100%', 250);
			if($('.square-ad-comp').length > 0) $('.square-ad-comp').loadBanner('300', '100%', 250);
		}else{
			if($('.banner-ad').length > 0) $('.banner-ad').loadBanner('728', 728, 90);
			setTimeout(function(){
				if($('.square-ad').length > 0) $('.square-ad').loadBanner('300', '100%', 250);
			}, 4000);
			setTimeout(function(){
				if($('.square-ad-comp').length > 0) $('.square-ad-comp').loadBanner('300', '100%', 250);
			}, 8000);
		}
	}
	$(window).resize(centerImg);
	if($('#bg').length > 0) loadImage();
	});

var v = 0.
curIndex = 0,
fR = false,
vR = false,
vE = false,
emptyTab = false;
sE = false,
isClicked = false,
continuousPlay = 1,
autoPlay = 1,
errorImg = "http://images.mypodstudios.com/pod/broke.jpg",
	staticImg = "http://images.mypodstudios.com/pod/mpph.jpg",
vids = [
	[{title: "Ark",url: "http://videos.openfilmpod.com/Ark.flv", id: 4201, views: 74351, takesAds: 1, aspect: "16:9", cuepoints: "", desc: "<P>An unknown virus has destroyed almost the entire human population. Oblivious to the true nature of the disease, the only remaining survivors escape to the sea. In great ships, they set off in search of uninhabited land. So begins the exodus, led by one man...</P>", tags: "open film, openfilm, ark, virus, human population, disease, survivor, exodus"},{title: "Checkmate",url: "http://videos.openfilmpod.com/Checkmate.flv", id: 4202, views: 10048, takesAds: 1, aspect: "16:9", cuepoints: "", desc: "<P>Soloman, a disfigured but brilliant inventor, needs to transfer the artificial intelligence he is in love with into a larger hard drive before she breaks down and dies. Evelyn, a home health care worker, insists on examining Soloman's wounds and forces her way into his workshop, preventing Soloman from finishing his work on the larger hard drive.<BR><BR>Soloman realizes he must kill Evelyn and transfer the artificial intelligence into her body to save it. Can Soloman bring himself to murder an innocent woman, or will he let the sentient being he created, and now loves,&nbsp;die?&nbsp; Soon, Soloman will realize he's made a terrible mistake.</P>", tags: "openfilm, open film, checkmate, soloman, evelyn, artificial intelligence, inventor, hard drive"},{title: "Cyberpunks",url: "http://videos.openfilmpod.com/Cyberpunks.flv", id: 4203, views: 4406, takesAds: 1, aspect: "16:9", cuepoints: "", desc: "<P>For every problem, there is a program.</P>", tags: "openfilm, open film, cyberpunks, problem, program"},{title: "Echo",url: "http://videos.openfilmpod.com/Echo.flv", id: 4204, views: 3557, takesAds: 1, aspect: "16:9", cuepoints: "", desc: "<P>A young, brilliant boy fails to invent a time machine, but quickly discovers that his invention is more than what it seems.</P>", tags: "open film, openfilm, echo, invention, time machine"},{title: "ETA",url: "http://videos.openfilmpod.com/ETA.flv", id: 4205, views: 3884, takesAds: 1, aspect: "16:9", cuepoints: "", desc: "<P>Marvin has the most boring job in the universe,&nbsp;but all is not as it seems.</P>", tags: "openfilm, open film, ETA, marvin, sci-fi, science fiction"},{title: "Gifted - Part One: Anna",url: "http://videos.openfilmpod.com/Gifted_Part_One___Anna.flv", id: 4206, views: 1837, takesAds: 1, aspect: "16:9", cuepoints: "", desc: "<P>This is the first episode of a three part \"Web Movie\" about Anna Tobin and her special gift.</P>", tags: "openfilm, open film, gifted, anna, web movie, anna tobin, special gift"},{title: "Project Projection - Vancouver Film School (VFS)",url: "http://videos.openfilmpod.com/Project_Projection_VFS.flv", id: 4207, views: 1804, takesAds: 1, aspect: "16:9", cuepoints: "", desc: "<P>Created by Vancouver Film School (\"VFS\") students through the following VFS production programs:<BR><BR>Film Production:<BR>Director - Carter Smith<BR>Director of Photography - Mark Ringrose<BR>Writer - Carter Smith<BR>Producer - Marie Laderoute<BR>Editor - Steve Stransman<BR>Art Director - Alyssa King<BR><BR>Makeup Design for Film &amp; Television:<BR>Make Up Artist - Vera Tsang<BR><BR>Sound Design for Visual Media:<BR>Sound Design - Chris Lefebvre&nbsp;and Jay Page</P>", tags: "openfilm, open film, project projection, vfs, vancouver film school, carter smith, marie laderoute, steve stransman"},{title: "Sebastian's Voodoo",url: "http://videos.openfilmpod.com/Sebastians_Voodoo.flv", id: 4208, views: 1166, takesAds: 1, aspect: "16:9", cuepoints: "", desc: "<P>A voodoo doll must find the courage to save his friends from being pinned to death.</P>", tags: "openfilm, open film, sebastian's voodoo, sebastian, voodoo, doll, voodoo doll"},{title: "Siubhlachan (The Traveller)",url: "http://videos.openfilmpod.com/Siubhlachan_The_Traveler.flv", id: 4209, views: 917, takesAds: 1, aspect: "16:9", cuepoints: "", desc: "<P>A poignant tale about a young girl, Seonag, who travels back in time to visit her recently deceased grandfather.<BR><BR>Siubhlachan won Best Professional Film at the first ever FilmG Competition in 2009 - a competition for films shot in Scottish Gaelic. The film has gone on to screen at festivals worldwide, including renowned genre film festivals such as PiFan, South Korea and the Trieste Science&nbsp;&amp; Fiction film festival in Italy.<BR>Siubhlachan was developed into a broadcast pilot, which screened on Christmas Eve 2009 on BBC ALBA. Unfortunately, there was no funding available to develop Siubhlachan into a drama series. We are now looking to develop the Siubhlachan concept into a feature film.</P>", tags: "open film, openfilm, seonag, siubhlachan, the traveller, filmg competition, scottish, gaelic, pifan, trieste science & fiction film festival"},{title: "Space Alone by Ilias Sounas",url: "http://videos.openfilmpod.com/Space_Alone_by_Ilias_Sounas.flv", id: 4210, views: 1013, takesAds: 1, aspect: "16:9", cuepoints: "", desc: "<P>\"Everyone is looking for a friend. Even in space...\"</P>", tags: "open film, openfilm, space alone, ilias sounas, space"},{title: "Starcrossed",url: "http://videos.openfilmpod.com/Starcrossed.flv", id: 4211, views: 681, takesAds: 1, aspect: "16:9", cuepoints: "", desc: "<P>A scientist, frustrated by his loneliness, sets about discovering an equation to locate the girl of his dreams. He spends a week embarking on a series of failed rendezvous, which only compounds his feelings of isolation.&nbsp; Despite these setbacks, he's determined to find her, so he goes back to the drawing board.&nbsp; She has to be out there somewhere.</P>", tags: "open film, openfilm, starcrossed, scientist, rendezvous"},{title: "The 3rd Letter - Full Short",url: "http://videos.openfilmpod.com/The_3rd_Letter_Full_Short.flv", id: 4212, views: 633, takesAds: 1, aspect: "16:9", cuepoints: "", desc: "<P>Set against a polluted, megalopolis world, the tragic tale of Jeffrey Brief (Rodrigo Lopresti) unfolds.&nbsp; Faced with the imminent loss of his crucial health insurance, Brief unwittingly unravels the dark truth behind population control that pushes him to unspeakable lengths.</P>", tags: "openfilm, open film, the 3rd letter, jeffrey brief, rodrigo lopresti, population control, polluted, megalopolis"},{title: "The Initiation of Kim Sun",url: "http://videos.openfilmpod.com/The_Initiation_of_Kim_Sun.flv", id: 4213, views: 563, takesAds: 1, aspect: "16:9", cuepoints: "", desc: "<P>Directed by Henry Scholfield.</P>", tags: "openfilm, open film, initiation of kim sun, henry scholfield, kim sun"},{title: "Tin Can Heart",url: "http://videos.openfilmpod.com/Tin_Can_Heart.flv", id: 4214, views: 768, takesAds: 1, aspect: "16:9", cuepoints: "", desc: "<P>A lonely robot puppy seeks a friend.</P>", tags: "open film, openfilm, tin can heart, robot, puppy, robot puppy"},{title: "Tomorrow's Love - Vancouver Film School (VFS)",url: "http://videos.openfilmpod.com/Tomorrows_Love_VFS.flv", id: 4215, views: 494, takesAds: 1, aspect: "16:9", cuepoints: "", desc: "<P>Created by Vancouver Film School (\"VFS\") students through the VFS Film Production program.<BR><BR>Writer/Director: Arun Fryer<BR>Producer: Shea Hasell<BR>Director of Photography: Patricio Pacheco<BR>Art Director: Ghazele Soltani<BR>Editor: Jackson Harper<BR>Assistant Director: Adele Blandin<BR>Camera Operator: Jackson Harper<BR>Assistant Camera: Jani Penttinen<BR>Sound Supervisor: Hale Darling Boom<BR>Op: Shea Hasell<BR>Grip/Gaffer: Chris Tobiesen&nbsp;and Alvin Brigemohun<BR>Hair and Make-up Artist: Steph Miramontes<BR>Cast: Bradley Stryker and&nbsp;Natalie Rivalin.</P>", tags: "open film, openfilm, tomorrow's love, vfs, vancouver film school, bradley stryker, natalie rivalin, arun fryer, shea hasell, jackson harper "}]];

function playerReady(){
	console.log("JS received player is ready callback");
	if(sE){
		console.log("System error.  Displaying image.");
		showImg(errorImg, "sysError");
	}else{
		if(autoPlay){
			console.log("Autoplay is enabled, calling preparevideo");
			$('.current .item').filter(':first').click();
		}else{
			console.log("Autoplay not enabled.  Showing static image");
			showImg(staticImg, "static");
		}	
	}
}

function prepareVideo(){
	console.log("Arrived in prepareVideo, calling prepareAd in player");
	if(v >= vids[curIndex].length) v = 0;
	changeColor(vids[curIndex][v]);
	getFlashMovie("videoplayer").prepareAd(vids[curIndex][v]);
	var headerTextObj = $('#video-info .header h1'),
	headerText = $(headerTextObj).html();
	if(-1 !== headerText.toLowerCase().indexOf('pod')){
		$(headerTextObj).fadeTo(500, 0, function(){
			$(headerTextObj).empty().append('About This Video').fadeTo(500, 1);
		});
	}
	$('#video-info-scroll .scrollbar').fadeTo(500, 0);
	$('#video-info-scroll .overview').fadeTo(500, 0, function(){
		var thisObj = $(this),
		itemText = vids[curIndex][v].desc;
		if(vids[curIndex][v].tags.length > 0) itemText += '<p><span>Tags: </span>' + vids[curIndex][v].tags + '</p>';
		$(thisObj).html('').append(itemText);
		
		$('#video-info-scroll').tinyscrollbar_update();
		if($(thisObj).height() > $(thisObj).parent().height()) $('#video-info-scroll .scrollbar').fadeTo(500, 1);
		else $('#video-info-scroll .scrollbar').hide();
		$(thisObj).fadeTo(500, 1);	
		v++;
	});
	
}

function videoReady(){
	console.log("JS received video is ready callback");
	vR = true;
	startNewMovie();
}

function startNewMovie(){
	console.log("Arrived in startNewMovie");
	getFlashMovie("videoplayer").startNewMovie();
	isClicked = false;
}

function videoComplete(){
	console.log("JS received videoComplete callback");
	vR = false;
	if(emptyTab) showImg(staticImg, "static");
	else if(!vE && (continuousPlay || isClicked)){
		if($('#player-image').css('opacity') == 1){
			$('#player-image').fadeTo(500, 0, function(){
				$(this).hide();
				prepareVideo();
			});
		}else prepareVideo();
	}else if(vE) showImg(errorImg ,"error");
	else{
		showImg(staticImg, "static");
		var headerTextObj = $('#video-info .header h1'),
		headerText = $(headerTextObj).html();
		if(-1 !== headerText.toLowerCase().indexOf('video')){
			$(headerTextObj).fadeTo(500, 0, function(){
				$(headerTextObj).empty().append('About This Pod').fadeTo(500, 1);
				$('#video-info-scroll .overview').fadeTo(500, 0, function(){
					var thisObj = $(this),
					podText = $('#pod-desc-info').html();
					$(thisObj).empty().append(podText);
					$('#video-info-scroll').tinyscrollbar_update();
					if($(thisObj).height() > $(thisObj).parent().height()) $('#video-info-scroll .scrollbar').fadeTo(500, 1);
					else $('#video-info-scroll .scrollbar').fadeTo(500, 0);
					$(thisObj).fadeTo(500, 1);
				});
			});
		}
	}
}

function changeColor(vidObj){
	var mF = false;
	$('.current .item').each(function(){
		$(this).removeClass('current');
		if(!mF){
			var id = Number($(this).find('.id').html());
			if(vidObj.id == id){
				$(this).addClass('current');
				mF = true;
			}		
		}
	});
}

function showImg(imgSrc, type){
	var newImg = new Image();
	newImg.onload = function(){
		$('#player-image').fadeTo(500, 0, function(){
			var defaultView = '';
			switch(type){
				case "error":
					defaultView = $('<div id="error-img"><img src="' + imgSrc + '" alt="Video Not Found" /><div id="img-info"><p>Sorry.  Looks like there was an error with your video.  <span>Please pick antoher.</span></p></div></div>');
					break;
				case "sysError":
					defaultView = $('<div id="static-img"><div id="img-info"><h1>Something\'s Always On.</h1><p class="mypod-logo"><img src="http://images.mypodstudios.com/logos/newcolors/logocolor.png" alt="MyPod Logo" /></p></div></div>');
					break;
				default:
					if(imgSrc !== 'http://images.mypodstudios.com/pod/mpph.jpg') defaultView = $('<div id="static-img"><img src="' + imgSrc + '" alt="Placeholder Image" /></div>');
					else defaultView = $('<div id="static-img"><div id="img-info"><h1>Something\'s Always On.</h1><p>Please select a new video to watch.</p><p class="mypod-logo"><img src="http://images.mypodstudios.com/logos/newcolors/logocolor.png" alt="MyPod Logo" /></p></div></div>');
					break;
			}
			$('#player-image').empty().append(defaultView);
			$('#player-image').fadeTo(500, 1);
		})
	};
	newImg.src = imgSrc;
}

function getFlashMovie(movieName){
	var isIE = navigator.appName.indexOf("Microsoft") != -1;
	return (isIE) ? window[movieName] : document[movieName];
}