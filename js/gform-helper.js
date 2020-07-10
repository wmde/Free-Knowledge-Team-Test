
jQuery(document).ready(function(){

    jQuery('.screen').not('.screen--start').append('<div class="graphic-1 graphic"></div><div class="graphic-2 graphic"></div><div class="graphic-3 graphic"></div><div class="graphic-4 graphic"></div><div class="graphic-5 graphic"></div><div class="graphic-6 graphic"></div><div class="graphic-7 graphic"></div><div class="graphic-8 graphic"></div>');
    jQuery('.screen--start').append('<div class="graphic-5 graphic"></div><div class="graphic-6 graphic"></div><div class="graphic-7 graphic"></div>');
    jQuery('.screen--start .screen__inner').append('<div class="graphic-1 graphic"></div><div class="graphic-2 graphic"></div><div class="graphic-3 graphic"></div><div class="graphic-4 graphic"></div>');

    // checks if form is on count page
    if( jQuery('.gform_wrapper form').length > 0 ) {

      jQuery('.app').addClass('started');
      jQuery('.gform_wrapper form li.screen').addClass('active');

      if(  jQuery('.gform_page').last().is(':visible') )  {

        jQuery('.gfield_radio input[type=radio]').bind("click", function() {

          jQuery('.app').removeClass('started');
          jQuery('.gform_wrapper form li.screen').removeClass('active');
          setTimeout(function(){
            jQuery('.gform_wrapper').css({'height':'0px'}); // can't hide because we need to trigger submit later on
            jQuery('.screen--end').show();
          }, 375);
          setTimeout(function(){
            jQuery('.screen--end').addClass('active');
          }, 750);

          var that = this;
          setTimeout(function(){
            var link = jQuery(that).closest('.gform_page').find('.gform_button'); //#gform_submit_button_1
            link.click();
          }, 2000);

        });
      }else{
        jQuery('.gfield_radio input[type=radio]').bind("click", function() {
          var link = jQuery(this).closest('.gform_page').find('.gform_page_footer .gform_next_button.button');
          link.click();
        });
      }
  	}
});
