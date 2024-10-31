<?php 

// Short Code Field For Nice Accordion
function nice_accor_shortcode_field($atts)

{
    
	extract(shortcode_atts(array( 'id' => NULL), $atts));

    global $post;

    $output = '';

    $post_id = (NULL === $id) ? $post -> ID : $id;

         
    $post_meta = get_post_meta($post_id, 'nice_accordion_repeat_group', true);
    $accor_width = get_post_meta($post_id, 'accor_width', true);
    $accor_main_title = get_post_meta($post_id, 'accor_main_title', true);
    $accor_expand_icon = get_post_meta($post_id, 'accor_expand_icon', true);
    $accor_close_icon = get_post_meta($post_id, 'accor_close_icon', true);
    $accor_icon_color = get_post_meta($post_id, 'accor_icon_color', true);
    $accor_icon_bgcolor = get_post_meta($post_id, 'accor_icon_bgcolor', true);
    $accor_active_title_color = get_post_meta($post_id, 'accor_active_title_color', true);
    $accor_title_active_bgcolor = get_post_meta($post_id, 'accor_title_active_bgcolor', true);

    $accor_title_color = get_post_meta($post_id, 'accor_title_color', true);
    $accor_title_bgcolor = get_post_meta($post_id, 'accor_title_bgcolor', true);
    $accor_desc_txtcolor = get_post_meta($post_id, 'accor_desc_txtcolor', true);
    $accor_desc_txt_bgcolor = get_post_meta($post_id, 'accor_desc_txt_bgcolor', true);
    $accoritem_bordertop_color =get_post_meta($post_id,'accoritem_bordertop_color', true);


    $output ="<div class='plugin_accor'>
   <h2>".$accor_main_title."</h2>
   <ul>"; 
   foreach($post_meta as $single_value):
    
    $output.= "<li>
       <h5 class='icon ".$accor_expand_icon."'>" . $single_value['accor_title']."</h5>
      <div>" . $single_value['accor_description']."</div>
    </li>";
     endforeach;

  $output.= "</ul>
 </div>";

 ?>


<style type="text/css">

.plugin_accor {
     max-width:<?php echo $accor_width;   ?>;
    }

.plugin_accor ul li h5.plus {
  border-bottom: #CCC solid 1px;
  color:<?php echo $accor_active_title_color;   ?>;
  background:<?php echo $accor_title_active_bgcolor; ?>;
}
.plugin_accor ul li h5.icon:before { 
	color:<?php echo $accor_icon_color;   ?>; 
    background:<?php echo $accor_icon_bgcolor;   ?>;
    }

.plugin_accor ul li h5 { 

	color:<?php echo $accor_title_color;   ?>; 
	background:<?php echo $accor_title_bgcolor;   ?>;
    
  }

 .plugin_accor ul li > div { 
 	color:<?php echo $accor_desc_txtcolor;  ?> ; 
 	background:<?php echo $accor_desc_txt_bgcolor; ?>    }

 .plugin_accor ul li > div a {
  color: <?php echo $accor_desc_txtcolor;  ?>;
   }

  .plugin_accor ul li h5 {
  border-top:<?php echo $accoritem_bordertop_color; ?> solid 1px;
  }

</style>

<script type="text/javascript"> 
	var accor_expand_icon = "<?= $accor_expand_icon; ?>";
	var accor_close_icon = "<?= $accor_close_icon; ?>";
</script>

<?php 
		
    return $output;

}

add_shortcode('nice_accor', 'nice_accor_shortcode_field');