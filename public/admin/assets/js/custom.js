var Finlab = function(){
	"use strict"
   /* Search Bar ============ */
   var screenWidth = $( window ).width();
   var screenHeight = $( window ).height();

   var handlePreloader = function(){
	   setTimeout(function() {
		   jQuery('#preloader').remove();
		   $('#main-wrapper').addClass('show');
	   },800);	
	   
   }

   var handleMetisMenu = function() {
	   if(jQuery('#menu').length > 0 ){
		   $("#menu").metisMenu();
	   }
	   jQuery('.metismenu > .mm-active ').each(function(){
		   if(!jQuery(this).children('ul').length > 0)
		   {
			   jQuery(this).addClass('active-no-child');
		   }
	   });
   }
  
   var handleAllChecked = function() {
	   $("#checkAll").on('change',function() {
		   $("td input, .email-list .custom-checkbox input").prop('checked', $(this).prop("checked"));
	   });
   }

   var handleNavigation = function() {
	   $(".nav-control").on('click', function() {

		   $('#main-wrapper').toggleClass("menu-toggle");

		   $(".hamburger").toggleClass("is-active");
	   });
   }
 
   var handleCurrentActive = function() {
	   for (var nk = window.location,
		   o = $("ul#menu a").filter(function() {
			   
			   return this.href == nk;
			   
		   })
		   .addClass("mm-active")
		   .parent()
		   .addClass("mm-active");;) 
	   {
		   
		   if (!o.is("li")) break;
		   
		   o = o.parent()
			   .addClass("mm-show")
			   .parent()
			   .addClass("mm-active");
	   }
   }

   var handleMiniSidebar = function() {
	   $("ul#menu>li").on('click', function() {
		   const sidebarStyle = $('body').attr('data-sidebar-style');
		   if (sidebarStyle === 'mini') {
			   console.log($(this).find('ul'))
			   $(this).find('ul').stop()
		   }
	   })
   }
  
   var handleMinHeight = function() {
	   var win_h = window.outerHeight;
	   var win_h = window.outerHeight;
	   if (win_h > 0 ? win_h : screen.height) {
		   $(".content-body").css("min-height", (win_h + 60) + "px");
	   }
   }
   
   var handleDataAction = function() {
	   $('a[data-action="collapse"]').on("click", function(i) {
		   i.preventDefault(),
			   $(this).closest(".card").find('[data-action="collapse"] i').toggleClass("mdi-arrow-down mdi-arrow-up"),
			   $(this).closest(".card").children(".card-body").collapse("toggle");
	   });

	   $('a[data-action="expand"]').on("click", function(i) {
		   i.preventDefault(),
			   $(this).closest(".card").find('[data-action="expand"] i').toggleClass("icon-size-actual icon-size-fullscreen"),
			   $(this).closest(".card").toggleClass("card-fullscreen");
	   });



	   $('[data-action="close"]').on("click", function() {
		   $(this).closest(".card").removeClass().slideUp("fast");
	   });

	   $('[data-action="reload"]').on("click", function() {
		   var e = $(this);
		   e.parents(".card").addClass("card-load"),
			   e.parents(".card").append('<div class="card-loader"><i class=" ti-reload rotate-refresh"></div>'),
			   setTimeout(function() {
				   e.parents(".card").children(".card-loader").remove(),
					   e.parents(".card").removeClass("card-load")
			   }, 2000)
	   });
   }

   var handleHeaderHight = function() {
	   const headerHight = $('.header').innerHeight();
	   $(window).scroll(function() {
		   if ($('body').attr('data-layout') === "horizontal" && $('body').attr('data-header-position') === "static" && $('body').attr('data-sidebar-position') === "fixed")
			   $(this.window).scrollTop() >= headerHight ? $('.dlabnav').addClass('fixed') : $('.dlabnav').removeClass('fixed')
	   });
   }
   
   var handleMenuTabs = function() {
	   if(screenWidth <= 991 ){
		   jQuery('.menu-tabs .nav-link').on('click',function(){
			   if(jQuery(this).hasClass('open'))
			   {
				   jQuery(this).removeClass('open');
				   jQuery('.fixed-content-box').removeClass('active');
				   jQuery('.hamburger').show();
			   }else{
				   jQuery('.menu-tabs .nav-link').removeClass('open');
				   jQuery(this).addClass('open');
				   jQuery('.fixed-content-box').addClass('active');
				   jQuery('.hamburger').hide();
			   }
			   //jQuery('.fixed-content-box').toggleClass('active');
		   });
		   jQuery('.close-fixed-content').on('click',function(){
			   jQuery('.fixed-content-box').removeClass('active');
			   jQuery('.hamburger').removeClass('is-active');
			   jQuery('#main-wrapper').removeClass('menu-toggle');
			   jQuery('.hamburger').show();
		   });
	   }
   }
   
   var handleChatbox = function() {
	   jQuery('.bell-link').on('click',function(){
		   jQuery('.chatbox').addClass('active');
	   });
	   jQuery('.chatbox-close').on('click',function(){
		   jQuery('.chatbox').removeClass('active');
	   });
   }
   
   var handleMenuWallet = function() {
	   
	   setTimeout(function(){
		   if(screenWidth <= 1480){
			   $('.wallet-bar').removeClass('active');
			   $('.wallet-open').removeClass('active');
		   }	
	   }, 700);
	   
	   if(jQuery('.menu-wallet').length > 0 ){
		   jQuery('.menu-wallet').unbind().on('click',function(){
			   jQuery('.wallet-bar').toggleClass('active');
			   jQuery('.wallet-open').toggleClass('active');
		   });
	   }
	   jQuery('.closed-icon').on('click',function(){
		   jQuery('.wallet-open').removeClass('active');
	   });
   }

   var handleBtnNumber = function() {
	   $('.btn-number').on('click', function(e) {
		   e.preventDefault();

		   fieldName = $(this).attr('data-field');
		   type = $(this).attr('data-type');
		   var input = $("input[name='" + fieldName + "']");
		   var currentVal = parseInt(input.val());
		   if (!isNaN(currentVal)) {
			   if (type == 'minus')
				   input.val(currentVal - 1);
			   else if (type == 'plus')
				   input.val(currentVal + 1);
		   } else {
			   input.val(0);
		   }
	   });
   }
   
   var handleDzChatUser = function() {
	   jQuery('.dlab-chat-user-box .dlab-chat-user').on('click',function(){
		   jQuery('.dlab-chat-user-box').addClass('d-none');
		   jQuery('.dlab-chat-history-box').removeClass('d-none');
	   }); 
	   
	   jQuery('.dlab-chat-history-back').on('click',function(){
		   jQuery('.dlab-chat-user-box').removeClass('d-none');
		   jQuery('.dlab-chat-history-box').addClass('d-none');
	   }); 
	   
	   jQuery('.dlab-fullscreen').on('click',function(){
		   jQuery('.dlab-fullscreen').toggleClass('active');
	   });
	   
   }
   /* WOW ANIMATION ============ */
   var wow_animation = function(){
	   if($('.wow').length > 0)
	   {
		   var wow = new WOW(
		   {
			 boxClass:     'wow',      // animated element css class (default is wow)
			 animateClass: 'animated', // animation css class (default is animated)
			 offset:       0,          // distance to the element when triggering the animation (default is 0)
			 mobile:       false       // trigger animations on mobile devices (true is default)
		   });
		   wow.init();	
	   }	
   }
   
   
   var handleDzFullScreen = function() {
	   jQuery('.dlab-fullscreen').on('click',function(e){
		   if(document.fullscreenElement||document.webkitFullscreenElement||document.mozFullScreenElement||document.msFullscreenElement) { 
			   /* Enter fullscreen */
			   if(document.exitFullscreen) {
				   document.exitFullscreen();
			   } else if(document.msExitFullscreen) {
				   document.msExitFullscreen(); /* IE/Edge */
			   } else if(document.mozCancelFullScreen) {
				   document.mozCancelFullScreen(); /* Firefox */
			   } else if(document.webkitExitFullscreen) {
				   document.webkitExitFullscreen(); /* Chrome, Safari & Opera */
			   }
		   } 
		   else { /* exit fullscreen */
			   if(document.documentElement.requestFullscreen) {
				   document.documentElement.requestFullscreen();
			   } else if(document.documentElement.webkitRequestFullscreen) {
				   document.documentElement.webkitRequestFullscreen();
			   } else if(document.documentElement.mozRequestFullScreen) {
				   document.documentElement.mozRequestFullScreen();
			   } else if(document.documentElement.msRequestFullscreen) {
				   document.documentElement.msRequestFullscreen();
			   }
		   }		
	   });
   }
   
   var handleshowPass = function(){
	   jQuery('.show-pass').on('click',function(){
		   jQuery(this).toggleClass('active');
		   if(jQuery('#dlab-password').attr('type') == 'password'){
			   jQuery('#dlab-password').attr('type','text');
		   }else if(jQuery('#dlab-password').attr('type') == 'text'){
			   jQuery('#dlab-password').attr('type','password');
		   }
	   });
   }
   
   var heartBlast = function (){
	   $(".heart").on("click", function() {
		   $(this).toggleClass("heart-blast");
	   });
   }
   
   var handleDzLoadMore = function() {
	   $(".dlab-load-more").on('click', function(e)
	   {
		   e.preventDefault();	//STOP default action
		   $(this).append(' <i class="fas fa-sync"></i>');
		   
		   var dlabLoadMoreUrl = $(this).attr('rel');
		   var dlabLoadMoreId = $(this).attr('id');
		   
		   $.ajax({
			   method: "POST",
			   url: dlabLoadMoreUrl,
			   dataType: 'html',
			   success: function(data) {
				   $( "#"+dlabLoadMoreId+"Content").append(data);
				   $('.dlab-load-more i').remove();
			   }
		   })
	   });
   }
   
   var handleLightgallery = function(){
	   if(jQuery('#lightgallery').length > 0){
		   $('#lightgallery').lightGallery({
			   loop:true,
			   thumbnail:true,
			   exThumbImage: 'data-exthumbimage'
		   });
	   }
   }
   var handleCustomFileInput = function() {
	   $(".custom-file-input").on("change", function() {
		   var fileName = $(this).val().split("\\").pop();
		   $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	   });
   }
   
	 var vHeight = function(){
	   var ch = $(window).height() - 206;
	   $(".chatbox .msg_card_body").css('height',ch);
   }
   
   	var domoPanel = function(){
		if(jQuery('.dlab-demo-content').length > 0){
			const ps = new PerfectScrollbar('.dlab-demo-content');
		}
	    $('.dlab-demo-trigger').on('click', function() {
			$('.dlab-demo-panel').addClass('show');
		});
		$('.dlab-demo-close, .bg-close').on('click', function() {
			$('.dlab-demo-panel').removeClass('show');
		});
		 
		$('.dlab-demo-bx').on('click', function() {
			$('.dlab-demo-bx').removeClass('demo-active');
			$(this).addClass('demo-active');
		});
   } 
   
   var handleDatetimepicker = function(){
	   if(jQuery("#datetimepicker1").length>0) {
		   $('#datetimepicker1').datetimepicker({
			   inline: true,
		   });
	   }
   }
   
   var handleCkEditor = function(){
	   if(jQuery("#ckeditor").length>0) {
		   ClassicEditor
		   .create( document.querySelector( '#ckeditor' ), {
			   // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		   } )
		   .then( editor => {
			   window.editor = editor;
		   } )
		   .catch( err => {
			   console.error( err.stack );
		   } );
	   }
   }
   
   var handleMenuPosition = function(){
	   
	   if(screenWidth > 1024){
		   $(".metismenu  li").unbind().each(function (e) {
			   if ($('ul', this).length > 0) {
				   var elm = $('ul:first', this).css('display','block');
				   var off = elm.offset();
				   var l = off.left;
				   var w = elm.width();
				   var elm = $('ul:first', this).removeAttr('style');
				   var docH = $("body").height();
				   var docW = $("body").width();
				   
				   if(jQuery('html').hasClass('rtl')){
					   var isEntirelyVisible = (l + w <= docW);	
				   }else{
					   var isEntirelyVisible = (l > 0)?true:false;	
				   }
					   
				   if (!isEntirelyVisible) {
					   $(this).find('ul:first').addClass('left');
				   } else {
					   $(this).find('ul:first').removeClass('left');
				   }
			   }
		   });
	   }
   }

   var handleCustomActions = function(){
	   jQuery('.w3-delete').on('click',function(){
		   jQuery(this).parents('tr').attr('style','background-color:red !important').fadeOut('slow',function(){
			   jQuery(this).remove();
		   });
	   });
   }
   var handleImageSelect = function(){

	   const $_SELECT_PICKER = $('.image-select');
	   $_SELECT_PICKER.find('option').each((idx, elem) => {
		   const $OPTION = $(elem);
		   const IMAGE_URL = $OPTION.attr('data-thumbnail');
		   if (IMAGE_URL) {
			   $OPTION.attr('data-content', "<img src='%i'/> %s".replace(/%i/, IMAGE_URL).replace(/%s/, $OPTION.text()))
		   }
	   });
	   $_SELECT_PICKER.selectpicker();
   }
   var onePageLayout = function() {
	   'use strict';
	   if($('.header').length > 0 && $(".scroll").length > 0)
	   {
		   var headerHeight =   parseInt($('.header').css('height'), 10);
		   //alert(headerHeight); 
		   
		   $(".scroll").unbind().on('click',function(event) 
		   {
			   event.preventDefault();
			   
			   if (this.hash !== "") {
				   var hash = this.hash;	
				   var seactionPosition = $(hash).offset().top;
				   var headerHeight =   parseInt($('.header').css('height'), 10);
				   
				   
				   $('body').scrollspy({target: ".navbar", offset: headerHeight+2}); 
				   
				   var scrollTopPosition = seactionPosition - (headerHeight);
				   
				   $('html, body').animate({
					   scrollTop: scrollTopPosition
				   }, 800, function(){
					   
				   });
			   }   
		   });
		   $('body').scrollspy({target: ".navbar", offset: headerHeight + 2});  
	   }
   }

   
   var handelBootstrapSelect = function(){
	   /* Bootstrap Select box function by  = bootstrap-select.min.js */ 
	   jQuery('select').selectpicker();
	   /* Bootstrap Select box function by  = bootstrap-select.min.js end*/
   }
 
   var handleDraggableCard = function() {
	   var dzCardDraggable = function () {
		return {
		 //main function to initiate the module
		 init: function () {
		  var containers = document.querySelectorAll('.draggable-zone');

		  if (containers.length === 0) {
		   return false;
		  }

		  var swappable = new Sortable.default(containers, {
		   draggable: '.draggable',
		   handle: '.draggable.draggable-handle',
		   mirror: {
			appendTo: 'body',
			constrainDimensions: true
		   }
		   
		  });
		  swappable.on('drag:stop', () => {
			   setTimeout(function(){
				   setBoxCount();
			   }, 200);
			   
		   })
		 }
		};
	   }();

	   jQuery(document).ready(function () {
		dzCardDraggable.init();
	   });
	   
	   
	   function setBoxCount(){
		   var cardCount = 0;
		   jQuery('.dropzoneContainer').each(function(){
			   cardCount = jQuery(this).find('.draggable-handle').length;
			   jQuery(this).find('.totalCount').html(cardCount);
		   });
	   }
   }

   var handleSupport = function(){
		/*var support = '<script id="DZScript" src="../../../dzassets.s3.amazonaws.com/w3-global8bb6.js?btn_dir=right"></script>';
		jQuery('body').append(support);*/
	}
	   

   /* Function ============ */
   return {
	   init:function(){
		   handleMetisMenu();
		   handleAllChecked();
		   handleNavigation();
		   handleCurrentActive();
		   handleMiniSidebar();
		   handleMinHeight();
		   handleDataAction();
		   handleHeaderHight();
		   handleMenuTabs();
		   handleChatbox();
		   handleMenuWallet();
		   handleBtnNumber();
		   handleDzChatUser();
		   handleDzFullScreen();
		   handleshowPass();
		   heartBlast();
		   wow_animation();
		   handleDzLoadMore();
		   handleLightgallery();
		   handleCustomFileInput();
		   vHeight();
		   domoPanel();
		   handleDatetimepicker();
		   handleCkEditor();
		   handleImageSelect();
		   handelBootstrapSelect();
		   onePageLayout();
		   handleDraggableCard();
		   
	   },

	   
	   load:function(){
		   handlePreloader();
		   handleCustomActions();
		   handleMenuWallet();
		   handleSupport();
	   },
	   
	   resize:function(){
		   screenWidth = $( window ).width();
		   vHeight();
		   handleMenuWallet();
	   },
	   
	   handleMenuPosition:function(){
		   
		   handleMenuPosition();
	   },
   }
   
}();

/* Document.ready Start */	
jQuery(document).ready(function() {
   $('[data-bs-toggle="popover"]').popover();
   'use strict';
   Finlab.init();
   
});
/* Document.ready END */

/* Window Load START */
jQuery(window).on('load',function () {
   'use strict'; 
   Finlab.load();
   setTimeout(function(){
		   Finlab.handleMenuPosition();
   }, 1000);
   
});
/*  Window Load END */
/* Window Resize START */
jQuery(window).on('resize',function () {
   'use strict'; 
   Finlab.resize();
   setTimeout(function(){
		   Finlab.handleMenuPosition();
   }, 1000);
});
/*  Window Resize END */