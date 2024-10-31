

jQuery(".plugin_accor li h5").click(function () {
  var current_li = jQuery(this).parent();
  jQuery(".plugin_accor li div").each(function(i,el) {      
    if(jQuery(el).parent().is(current_li)) {       
      if (jQuery(el).is(":visible")) {
        jQuery(el).prev().toggleClass("plus "+accor_close_icon).toggleClass(""+accor_expand_icon);
        jQuery(el).slideUp().removeClass("plus");
      } else {
         jQuery(el).prev().toggleClass("plus "+accor_close_icon).toggleClass(""+accor_expand_icon);
         jQuery(el).slideDown().addClass("plus")
      }
    } else{
      jQuery(el).prev().removeClass("plus "+accor_close_icon).addClass(""+accor_expand_icon);
      jQuery(el).slideUp();
    }
  });
});

jQuery('.plugin_accor li > div').hide();
jQuery('.plugin_accor li h5').first().addClass(accor_close_icon+" plus").removeClass(""+accor_expand_icon);
jQuery('.plugin_accor li > div').first().show().addClass("plus");