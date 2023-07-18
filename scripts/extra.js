jQuery.noConflict(); // Remove conflicts and let '$' symbol be accessible withing below function
jQuery(document).ready(function($) {


    var scrollTop                 = 0;
    var inside_header_container_1 = $('.et-l--header div.et_pb_gutters3');
    var inside_header_container_2 = $('.et-l--header div.et_pb_gutters3 .et_pb_section');
    inside_header_container_2.addClass("menu-compressed");


    $(window).scroll(function() {
    scrollTop = $(this).scrollTop();

    if(scrollTop > 0){
        inside_header_container_1.addClass("has_et_pb_sticky");
        inside_header_container_2.addClass("et_pb_sticky et_pb_sticky--top bg-change");
    }else{

        if($('.mobile_nav').hasClass('closed')){

            inside_header_container_1.removeClass("has_et_pb_sticky");
            inside_header_container_2.removeClass("et_pb_sticky et_pb_sticky--top bg-change");
        }
        
    }

    });
    // Change Classes when scrolling for change the header elements

    var click_count = 0;
    $('.mobile_menu_bar').click(function(){

        click_count++;

        if($('.mobile_nav').hasClass('closed')) {
            inside_header_container_1.addClass("has_et_pb_sticky");
            inside_header_container_2.addClass("et_pb_sticky et_pb_sticky--top bg-change menu-expanded");
            inside_header_container_2.removeClass("menu-compressed");
            $('.main_menu_button2').addClass("main_menu_button2_to_bottom");

          } else {
                if(scrollTop == 0){
                    inside_header_container_1.removeClass("has_et_pb_sticky");
                    inside_header_container_2.removeClass("et_pb_sticky et_pb_sticky--top bg-change");
                }
                inside_header_container_2.removeClass("menu-expanded");
                inside_header_container_2.addClass("menu-compressed");
                $('.main_menu_button2').removeClass("main_menu_button2_to_bottom");
          }

          if(click_count <= 3){
            $('.mobile_nav #menu-item-29').remove();
            $('.mobile_nav .sub-menu').each(function(){
              console.log('111');
              var item_count = $(this).find('li').length;
              var list_height = item_count * 30.8;
              console.log(list_height);
              $(this).attr('data-height', list_height);
              $(".sub-menu").animate({height: "0px"},0);
          });
        }
        // Get height of each sub menu and save it for later use

    });

    $(document).on('click', '.mobile_nav .et_mobile_menu .has-sub-menu a', function(event) {
          
          $(".mobile_menu_bar").trigger("click");
          var element = $(this).next(':first');
          if(element.hasClass('sub-menu-show')) {
              element.removeClass('sub-menu-show');
              element.addClass('sub-menu');
              element.animate({height: "0px"}, 500, function(){});
              $(this).removeClass('rotated-menu-icon');
                
          }else{

              element.addClass('sub-menu-show');
              var list_height = element.attr('data-height');
              element.animate({height: list_height+"px"}, 500, function(){});
              element.removeClass('sub-menu');
              $(this).addClass('rotated-menu-icon');
          }
        

      });
      // Animate submenu and icon when click a mobile menu item


      if ($(".global-footer").length) {
        
        $('.footer-mobile-links').hide();
       
        $('.footer-mobile-btn').click(function(e){
            e.preventDefault();
            var list = $(this).parent().next('.footer-mobile-links');
            list.toggle(500);
            $(this).toggleClass('expanded');
        });
        // Mobile Footer item toggle status 
      }

      
      
      
      if($('.music_player_section_wrapper').length){

        console.log('songs loaded');

        if($('.trainer-juan-de-la-arena').length){
          var repeat_status = false;
        }else{
          var repeat_status = true;
        }

        $('.music-player-slider.owl-carousel').owlCarousel({

            margin:15,
            nav:true,
            dots:true,
            loop:repeat_status,
            navText: [
                   "<img src='/wp-content/uploads/2023/05/trainers-left.png'>",
                   "<img src= '/wp-content/uploads/2023/05/trainers-right.png'>",
                 ],
            responsive:{
              0:{
                items:1,
                nav:false,
                stagePadding: 5,
              },
              600:{
                items:2,
                stagePadding: 10,
              },
              1000:{
                items:3.5,
                stagePadding: 0,
     
              }
            }
     
          });
      }

      if($('.speaker_section_wrapper').length){

        console.log('Speakers loaded');
        $('.speaker-slider.owl-carousel').owlCarousel({

            margin:15,
            nav:true,
            dots:true,
            loop:true,
            rows:1,
            navText: [
                   "<img src='/wp-content/uploads/2023/05/trainers-left.png'>",
                   "<img src= '/wp-content/uploads/2023/05/trainers-right.png'>",
                 ],
            responsive:{
              0:{
                items:1,
                rows:1,
                nav:false,
                stagePadding: 5,
              },
              600:{
                items:2,
                rows:1,
                stagePadding: 10,
              },
              1000:{
                items:3.5,
                rows:1,
                stagePadding: 0,
     
              }
            }
     
          });

      }
      

      if($('.review_section_wrapper').length){

      // Customer Review Slider

      var owl_options = {
        loop: true,
        margin: 20,
        nav: true,
        items: 2,
        autoWidth:false,
        smartSpeed: 450,
        navText: [
          "<img src='/wp-content/uploads/2023/05/trainers-left.png'>",
          "<img src= '/wp-content/uploads/2023/05/trainers-right.png'>",
        ],
        responsive: {
          0: {
            stagePadding: 30,
            margin: 0,
            nav: true,
			      items: 1,
          },
          768:{
  			    items : 2,
			      margin:0,
		  },
        },
        onInitialized:function(event){
          testimonial_slider_tilt(event);
        }
      };

      var target_testimonial_slider = $(
        ".review_section_wrapper .owl-carousel"
      ).owlCarousel(owl_options);

      target_testimonial_slider.on(
        "change.owl.carousel changed.owl.carousel resize.owl.carousel refresh.owl.carousel translate.owl.carousel dragged.owl.carousel",
        function (e) {
          testimonial_slider_tilt(e);
        }
      );

      function testimonial_slider_tilt(e) {
        var prev_owl_item = $(e.target)
          .find(".owl-item")
          .eq(e.item.index - 1);
        var next_owl_item = $(e.target)
          .find(".owl-item")
          .eq(e.item.index + 1);
  
        var parent_class = prev_owl_item.closest(".review-slider");
  
        $(parent_class).find(".tilt_left").removeClass("tilt_left");
        $(parent_class).find(".tilt_right").removeClass("tilt_right");
  
        prev_owl_item.addClass("tilt_left");
        next_owl_item.addClass("tilt_right");
      }
      }


    if($(".trainer-about-accordion").length){
    $('.et_pb_module.et_pb_accordion.trainer-about-accordion .et_pb_accordion_item.et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');
    }




    // All Trainer Page

    $(document).on('select change','#fp_trainers_locations , #fp_trainers_gender',function(){
      var select_train_location = $('#fp_trainers_locations').val();
      var select_traner_gender = $('#fp_trainers_gender').val();
      select_traner_gender = select_traner_gender.toLowerCase();
      console.log(select_train_location);
      console.log(select_traner_gender);
      $('.fp_trainers_boxes_wrapper .fp_trainer_box').each(function(index, el) {
          var this_box = $(this);
          var this_box_location = this_box.attr('data_region');
          var this_box_gender = this_box.attr('gender');
          if((select_train_location == "all") && (select_traner_gender == "all") ){
            $(this).fadeIn();
          }
          else if ((select_train_location == "all") && (select_traner_gender == this_box_gender)) {
            $(this).fadeIn();
          }
          else if ((select_train_location == this_box_location) && (select_traner_gender == "all")) {
            $(this).fadeIn();
          }
          else if ((select_train_location == this_box_location) && (select_traner_gender == this_box_gender)) {
            $(this).fadeIn();
          }
          else {
            $(this).fadeOut();
          }
      });
    });


  if($('div').hasClass('fp_trainers_filter_wrapper')){
      $(".trainers-view-more").click(function(e) {
        e.preventDefault();
  
        // show next 6 posts
        $(".fp_trainers_boxes_wrapper .fp_trainer_box:hidden").slice(0, 12).css("display", "block");
  
        // if no more posts exist to load more, hide load more button
        if ($(".fp_trainers_boxes_wrapper .fp_trainer_box:hidden").length === 0) {
            $('.trainers-view-more').css("display", "none");
       }
  
     });


    $("#fp_trainers_locations , #fp_trainers_gender").change(function(e) {
        $('.trainers-view-more').css("display", "none");
    });

  }

  if($('.trainer-andy-keating').length){
    var trainer_accordion = $('.trainer-about-accordion');
    var div3 = trainer_accordion.children().eq(2);  // Select the 3rd div
    var div4 = trainer_accordion.children().eq(3);  // Select the 4th div
    div4.insertBefore(div3);
  }

  if($('.trainer-dilawar-khan').length){
    $('.music_player_section_wrapper h2').text("SOUNDS OF DK");
  }

  

  $("#free_pt_btn").click(function(e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: $("#single-trainer-contact-section").offset().top-160
    }, 1000); // Adjust the scroll speed if needed (in milliseconds)
  });


  if (window.matchMedia("(max-width: 980px)").matches) {
    console.log("less than 600px");
    if($('.global-header').length){
      $('.global-header .menu-item-32 a').text('About');
    }
  } else {
    console.log("moire than 600px");
  }


  $('.sub-menu').click(function(e){
    var homePageURL = window.location.origin;
    console.log(homePageURL);
    window.location.href = homePageURL;
  });


  if($('.form-inputs').length){
    
    $(document).on('keypress','input.fname',function(e){
      const keyCode = e.which;
      if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 122) && keyCode !== 32) {
        e.preventDefault();
      }
    });

    $(document).on('keypress','input.contact_phone',function(e){
      const keyCode = e.which;
      if ((keyCode < 48 || keyCode > 57) && keyCode !== 43 && keyCode !== 45){
        e.preventDefault();
      }
    });

  }


  


});