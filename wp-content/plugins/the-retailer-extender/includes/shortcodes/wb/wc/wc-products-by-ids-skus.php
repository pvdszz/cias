<?php

// [products]

vc_map(array(
   "name" 			=> "Products",
   "category" 		=> "The Retailer",
   "description"	=> "Slider or Listing",
   "base" 			=> "products_mixed",
   "class" 			=> "",
   "icon" 			=> "products_mixed",
   
   "params" 	=> array(
      
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Title",
			"param_name"	=> "title"	
		),
		
		array(
			"type" => "autocomplete",
			"holder" => "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			'settings' 		=> array(
				'multiple' 		=> true,
				'unique_values' => true,
			),
			'description' => __( 'Input product ID or product SKU or product title to see suggestions', 'js_composer' ),
			"heading" => "Products",
			"param_name" => "ids"
		),
		array(
        'type' => 'hidden',
        // This will not show on render, but will be used when defining value for autocomplete
        'param_name' => 'sku',
      ),
		
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Layout Style",
			"param_name"	=> "layout",
			"value"			=> array(
				"Listing"	=> "listing",
				"Slider"	=> "slider"
			),
			"std"			=> "slider",
		),
		
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Order By",
			"param_name"	=> "orderby",
			"value"			=> array(
				"None"	=> "none",
				"ID"	=> "ID",
				"Title"	=> "title",
				"Date"	=> "date",
				"Rand"	=> "rand"
			),
			"std"			=> "date",
		),
		
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Order",
			"param_name"	=> "order",
			"value"			=> array(
				"Desc"	=> "desc",
				"Asc"	=> "asc"
			),
			"std"			=> "desc",
		),
   )
   
));

//Filters For autocomplete param:
  //For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
  add_filter( 'vc_autocomplete_products_mixed_ids_callback', array(
    'Vc_Vendor_Woocommerce',
    'productIdAutocompleteSuggester',
  ), 10, 1 ); // Get suggestion(find). Must return an array
  add_filter( 'vc_autocomplete_products_mixed_ids_render', array(
    'Vc_Vendor_Woocommerce',
    'productIdAutocompleteRender',
  ), 10, 1 ); // Render exact product. Must return an array (label,value)
  //For param: ID default value filter
  add_filter( 'vc_form_fields_render_field_products_mixed_ids_param_value', array(
    'Vc_Vendor_Woocommerce',
    'productIdDefaultValue',
  ), 10, 4 ); // Defines default value for param if not provided. Takes from other param value.