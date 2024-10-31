<?php

add_filter( 'cmb2_init', 'example_tabs_metaboxes' );
function example_tabs_metaboxes($post_id) {
	$box_options = array(
		'id'           => 'nice_accor_metabox_field',
		'title'        => __( 'Accordion Sections', 'cmb2' ),
		'object_types' => array( 'nice_accordion' ),
		'show_names'   => true,
		'show_in_rest' => 'read_and_write',

	);

    $post_id =0;

	if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
    $post_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
  }


	// Setup meta box
	$cmb = new_cmb2_box( $box_options );

	// setting tabs
	$tabs_setting           = array(
		'config' => $box_options,
		'tabs'   => array()
	);


	$tabs_setting['tabs'][] = array(
		'id'     => 'tab1',
		'title'  => __( 'Accordion Shortcodes', 'cmb2' ),
		'fields' => array(

			array(
                  'name' => 'Shortcode For Post And Page',
                  'id' => 'accor_shortcode1',
                  'type' => 'title',
                  'default' => '[nice_accor id="'.$post_id.'"]',
             'desc' => '<input type=\'text\' value=\'[nice_accor id="'.$post_id.'"]\'>'


			),

			array(
                  'name' => 'Shortcode For Using Theme File',
                  'id' => 'accor_shortcode2',
                  'type' => 'title',
                  'default' => '<?php echo do_shortcode("[nice_accor id="'.$post_id.'"]");',
                  'desc' => '<input type=\'text\' value=\'<?php echo do_shortcode("[nice_accor id="'.$post_id.'"]"); ?>\'>'
			),
			
		
		)
	);




$tabs_setting['tabs'][] = array(
		'id'     => 'tab2',
		'title'  => __( 'Accordion Contents', 'cmb2' ),
		'fields' => array(
					
			array(
				'id'      => 'nice_accordion_repeat_group',
				'desc'   => 'Accordion Repeatable Field',
				'type'    => 'group',
				'options' => array(
					'group_title'   => __( '{#} Accordion Group Title', 'cmb2' ),
					'add_button'    => __( 'Add Accordion Item', 'cmb2' ),
					'remove_button' => __( 'Remove Accordion Item', 'cmb2' ),
					'sortable'      => true,
					'closed'   => true,
					'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ),
				),
				'after_group' => 'niceaccor_add_js_for_repeatable_titles',
				
				'fields'  => array(
					array(
						
						'name' => 'Accordion Title',
                        'id' => 'accor_title',
                        'type' => 'text'
					),
					
					array(
						'name' => __( 'Accordion Description', 'cmb2' ),
						'id'   => 'accor_description',
						'type' => 'wysiwyg',
						'options' => array(
                        'teeny'         => true,
                        'textarea_rows' => 6,

						)
					)
				)
			)
		)
	);





	$tabs_setting['tabs'][] = array(
		'id'     => 'tab3',
		'title'  => __( 'Settings', 'cmb2' ),
		'fields' => array(

               	array(
				'name'    => 'Accordion Main Title',
	            'id'      => 'accor_main_title',
	            'type'    => 'text',
	            'default' => 'Nice Ultimate Accordion',
			),

				array(
				'name'    => 'Accordion Width',
	            'id'      => 'accor_width',
	            'desc'    => 'Accordion width measure by px',
	            'type'    => 'text',
	            'default' => '650px',
			),

			array(
				'name' => __( 'Expand Icon', 'cmb2' ),
				'desc' => __('You will find Icon name from here <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">Font Awesome Icon Name</a>, Example: fa-plus'),
				'id'   => 'accor_expand_icon',
				'type' => 'text',
				'default' => 'fa-plus'
			),

			array(
				'name' => __( 'Close Icon ', 'cmb2' ),
				'desc' => __('You will find Icon name from here <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">Font Awesome Icon Name</a>, Example: fa-minus'),
				'id'   => 'accor_close_icon',
				'type' => 'text',
				'default' => 'fa-minus'
			),

				array(
				'name'    => 'Icon Color',
	            'id'      => 'accor_icon_color',
	            'type'    => 'colorpicker',
	            'default' => '#000000',
	            'options' => array(
	            'alpha' => true, // Make this a rgba color picker.
	               ),
			),

					array(
				'name'    => 'Icon Background Color',
	            'id'      => 'accor_icon_bgcolor',
	            'type'    => 'colorpicker',
	            'default' => 'rgba(0,0,0,0.02)',
	            'options' => array(
	            'alpha' => true, // Make this a rgba color picker.
	               ),
			),

			array(
				'name'    => 'Active Title Color',
	            'id'      => 'accor_active_title_color',
	            'type'    => 'colorpicker',
	            'default' => '#000000',
	            'options' => array(
	            'alpha' => true, // Make this a rgba color picker.
	               ),
			),

			array(
				'name'    => 'Active Title Background Color',
	            'id'      => 'accor_title_active_bgcolor',
	            'type'    => 'colorpicker',
	            'default' => 'rgba(181,181,181,0.53)',
	            'options' => array(
	            'alpha' => true, // Make this a rgba color picker.
	               ),
			),

			array(
				'name'    => 'Title Color',
	            'id'      => 'accor_title_color',
	            'type'    => 'colorpicker',
	            'default' => '#000000',
	            'options' => array(
	            'alpha' => true, // Make this a rgba color picker.
	               ),
			),

			array(
				'name'    => 'Title Background Color',
	            'id'      => 'accor_title_bgcolor',
	            'type'    => 'colorpicker',
	            'default' => 'rgba(255,255,255,0.85)',
	            'options' => array(
	            'alpha' => true, // Make this a rgba color picker.
	               ),
			),

			array(
				'name'    => 'Description Text Color',
	            'id'      => 'accor_desc_txtcolor',
	            'type'    => 'colorpicker',
	            'default' => '#000',
	            'options' => array(
	            'alpha' => true, // Make this a rgba color picker.
	               ),
			),

			array(
				'name'    => 'Description Text Background Color',
	            'id'      => 'accor_desc_txt_bgcolor',
	            'type'    => 'colorpicker',
	            'default' => '#fff',
	            'options' => array(
	            'alpha' => true, // Make this a rgba color picker.
	               ),
			),

			array(
				'name'    => 'Accordion Item Border Top Color',
	            'id'      => 'accoritem_bordertop_color',
	            'type'    => 'colorpicker',
	            'default' => '#c1c1c1',
	            'options' => array(
	            'alpha' => true, // Make this a rgba color picker.
	               ),
			),

			
		)
	);
	

	// set tabs
	$cmb->add_field( array(
		'id'   => '__tabs',
		'type' => 'tabs',
		'tabs' => $tabs_setting
	) );
}


// Scripts For Repeatable Title

function niceaccor_add_js_for_repeatable_titles() {
	add_action( is_admin() ? 'admin_footer' : 'wp_footer', 'niceaccor_add_js_for_repeatable_titles_to_footer' );
}

function niceaccor_add_js_for_repeatable_titles_to_footer() {
	?>
	<script type="text/javascript">
	jQuery( function( $ ) {
		var $box = $( document.getElementById( 'nice_accor_metabox_field' ) );

		var replaceTitles = function() {
			$box.find( '.cmb-group-title' ).each( function() {
				var $this = $( this );
				var txt = $this.next().find( '[id$="accor_title"]' ).val();
				var rowindex;

				if ( ! txt ) {
					txt = $box.find( '[data-grouptitle]' ).data( 'grouptitle' );
					if ( txt ) {
						rowindex = $this.parents( '[data-iterator]' ).data( 'iterator' );
						txt = txt.replace( '{#}', ( rowindex + 1 ) );
					}
				}

				if ( txt ) {
					$this.text( txt );
				}
			});
		};

		var replaceOnKeyUp = function( evt ) {
			var $this = $( evt.target );
			var id = 'title';

			if ( evt.target.id.indexOf(id, evt.target.id.length - id.length) !== -1 ) {
				$this.parents( '.cmb-row.cmb-repeatable-grouping' ).find( '.cmb-group-title' ).text( $this.val() );
			}
		};

		$box
			.on( 'cmb2_add_row cmb2_shift_rows_complete', replaceTitles )
			.on( 'keyup', replaceOnKeyUp );

		replaceTitles();
	});
	</script>
	<?php
}