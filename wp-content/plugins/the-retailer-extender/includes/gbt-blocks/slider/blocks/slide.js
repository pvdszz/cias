( function( blocks, components, editor, i18n, element ) {

	const el = element.createElement;

	/* Blocks */
	const registerBlockType = wp.blocks.registerBlockType;

	const {
		TextControl,
		SelectControl,
		PanelBody,
		ToggleControl,
		Button,
		RangeControl,
		SVG,
		Path,
		Circle,
		Polygon,
	} = wp.components;

	const {
		InspectorControls,
		InnerBlocks,
		MediaUpload,
		RichText,
		AlignmentToolbar,
		BlockControls,
		PanelColorSettings,
	} = wp.blockEditor;

	var attributes = {
		imgURL: {
			type: 'string',
			attribute: 'src',
			selector: 'img',
			default: '',
		},
		imgID: {
			type: 'number',
		},
		imgAlt: {
			type: 'string',
			attribute: 'alt',
			selector: 'img',
		},
		title: {
			type: 'string',
			default: 'Slide Title',
		},
		titleSize: {
			type: 'number',
			default: 36,
		},
		description: {
			type: 'string',
			default: 'Slide Description'
		},
		descriptionSize: {
			type: 'number',
			default: 13,
		},
		textColor: {
			type: 'string',
			default: '#fff'
		},
		buttonText: {
			type: 'string',
			default: 'Button Text'
		},
		slideURL: {
			type: 'string',
			default: '#'
		},
		slideButton: {
			type: 'boolean',
			default: true
		},
		buttonTextColor: {
			type: 'string',
			default: '#fff'
		},
		buttonBgColor: {
			type: 'string',
			default: '#000'
		},
		backgroundColor: {
			type: 'string',
			default: '#24282e'
		},
		alignment: {
			type: 'string',
			default: 'center'
		},
		tabNumber: {
			type: "number"
		}
	};

	/* Register Block */
	registerBlockType( 'getbowtied/tr-slide', {
		title: i18n.__( 'Slide', 'the-retailer-extender' ),
		icon:
			el( SVG, { xmlns:'http://www.w3.org/2000/svg', viewBox:'0 0 100 100' },
				el( Path, { d:'M85,15H15v60h70V15z M20,70v-9l15-15l9,9L29,70H20z M36,70l19-19l21,19H36z M80,66.8L54.9,44l-7.4,7.4L35,39 L20,54V20h60V66.8z' } ),
				el( Path, { d:'M65,40c4.1,0,7.5-3.4,7.5-7.5S69.1,25,65,25s-7.5,3.4-7.5,7.5S60.9,40,65,40z M65,30c1.4,0,2.5,1.1,2.5,2.5 S66.4,35,65,35s-2.5-1.1-2.5-2.5S63.6,30,65,30z' } )
			),
		category: 'theretailer',
		parent: [ 'getbowtied/tr-slider' ],
		attributes: attributes,

		edit: function( props ) {

			var attributes = props.attributes;

			function getColors() {

				let colors = [
					{
						label: i18n.__( 'Title & Description', 'the-retailer-extender' ),
						value: attributes.textColor,
						onChange: function( newColor) {
							props.setAttributes( { textColor: newColor } );
						},
					},
					{
						label: i18n.__( 'Slide Background', 'the-retailer-extender' ),
						value: attributes.backgroundColor,
						onChange: function( newColor) {
							props.setAttributes( { backgroundColor: newColor } );
						}
					}
				];

				if( attributes.slideButton ) {
					colors.push(
						{
							label: i18n.__( 'Button Text', 'the-retailer-extender' ),
							value: attributes.buttonTextColor,
							onChange: function( newColor) {
								props.setAttributes( { buttonTextColor: newColor } );
							},
						},
						{
							label: i18n.__( 'Button Background', 'the-retailer-extender' ),
							value: attributes.buttonBgColor,
							onChange: function( newColor) {
								props.setAttributes( { buttonBgColor: newColor } );
							},
						}
					);
				}

				return colors;
			}

			return [
				el(
					InspectorControls,
					{
						key: 'gbt_18_tr_slide_inspector'
					},
					el(
						'div',
						{
							className: 'main-inspector-wrapper',
						},
						el(
							TextControl,
							{
								key: "gbt_18_tr_editor_slide_link",
	              				label: i18n.__( 'Slide Link', 'the-retailer-extender' ),
	              				type: 'text',
	              				value: attributes.slideURL,
	              				onChange: function( newText ) {
									props.setAttributes( { slideURL: newText } );
								},
							},
						),
						el( 'hr', {} ),
						el(
							ToggleControl,
							{
								key: "gbt_18_tr_editor_slide_button",
	              				label: i18n.__( 'Slide Button', 'the-retailer-extender' ),
	              				checked: attributes.slideButton,
	              				onChange: function() {
									props.setAttributes( { slideButton: ! attributes.slideButton } );
								},
							}
						),
						el(
							PanelBody,
							{
								key: 'gbt_18_tr_editor_slide_text_settings',
								title: i18n.__( 'Title & Description', 'the-retailer-extender' ),
								initialOpen: false,
							},
							el(
								RangeControl,
								{
									key: "gbt_18_tr_editor_slide_title_size",
									value: attributes.titleSize,
									allowReset: false,
									initialPosition: 36,
									min: 10,
									max: 72,
									label: i18n.__( 'Title Font Size', 'the-retailer-extender' ),
									onChange: function( newNumber ) {
										props.setAttributes( { titleSize: newNumber } );
									},
								}
							),
							el(
								RangeControl,
								{
									key: "gbt_18_tr_editor_slide_description_size",
									value: attributes.descriptionSize,
									allowReset: false,
									initialPosition: 13,
									min: 10,
									max: 72,
									label: i18n.__( 'Description Font Size', 'the-retailer-extender' ),
									onChange: function( newNumber ) {
										props.setAttributes( { descriptionSize: newNumber } );
									},
								}
							),
						),
						el(
							PanelColorSettings,
							{
								key: 'gbt_18_tr_editor_slide_colors',
								initialOpen: false,
								title: i18n.__( 'Colors', 'the-retailer-extender' ),
								colorSettings: getColors()
							},
						),
					),
				),
				el( 'div',
					{
						key: 		'gbt_18_tr_editor_slide_wrapper',
						className : 'gbt_18_tr_editor_slide_wrapper'
					},
					el(
						MediaUpload,
						{
							key: 'gbt_18_tr_editor_slide_image',
							allowedTypes: [ 'image' ],
							buttonProps: { className: 'components-button button button-large' },
	              			value: attributes.imgID,
							onSelect: function( img ) {
								props.setAttributes( {
									imgID: img.id,
									imgURL: img.url,
									imgAlt: img.alt,
								} );
							},
	              			render: function( img ) {
	              				return [
		              				! attributes.imgID && el(
		              					Button,
		              					{
		              						key: 'gbt_18_tr_slide_add_image_button',
		              						className: 'gbt_18_tr_slide_add_image_button button add_image',
		              						onClick: img.open
		              					},
		              					i18n.__( 'Add Image', 'the-retailer-extender' )
	              					),
	              					!! attributes.imgID && el(
	              						Button,
										{
											key: 'gbt_18_tr_slide_remove_image_button',
											className: 'gbt_18_tr_slide_remove_image_button button remove_image',
											onClick: function() {
												img.close;
												props.setAttributes({
									            	imgID: null,
									            	imgURL: null,
									            	imgAlt: null,
									            });
											}
										},
										i18n.__( 'Remove Image', 'the-retailer-extender' )
									),
	              				];
	              			},
						},
					),
					el(
						BlockControls,
						{
							key: 'gbt_18_tr_editor_slide_alignment'
						},
						el(
							AlignmentToolbar,
							{
								key: 'gbt_18_tr_editor_slide_alignment_control',
								value: attributes.alignment,
								onChange: function( newAlignment ) {
									props.setAttributes( { alignment: newAlignment } );
								}
							}
						),
					),
					el(
						'div',
						{
							key: 		'gbt_18_tr_editor_slide_wrapper',
							className: 	'gbt_18_tr_editor_slide_wrapper',
							style:
							{
								backgroundColor: attributes.backgroundColor,
								backgroundImage: 'url(' + attributes.imgURL + ')'
							},
						},
						el(
							'div',
							{
								key: 		'gbt_18_tr_editor_slide_content',
								className: 	'gbt_18_tr_editor_slide_content',
							},
							el(
								'div',
								{
									key: 		'gbt_18_tr_editor_slide_container',
									className: 	'gbt_18_tr_editor_slide_container align-' + attributes.alignment,
									style:
									{
										textAlign: attributes.alignment
									}
								},
								el(
									'div',
									{
										key: 		'gbt_18_tr_editor_slide_title',
										className: 	'gbt_18_tr_editor_slide_title',
									},
									el(
										RichText,
										{
											key: 'gbt_18_tr_editor_slide_title_input',
											style:
											{
												color: attributes.textColor,
												fontSize: attributes.titleSize + 'px'
											},
											format: 'string',
											className: 'gbt_18_tr_editor_slide_title_input',
											allowedFormats: [],
											tagName: 'h2',
											value: attributes.title,
											placeholder: i18n.__( 'Add Title', 'the-retailer-extender' ),
											onChange: function( newTitle) {
												props.setAttributes( { title: newTitle } );
											}
										}
									),
								),
								el(
									'div',
									{
										key: 		'gbt_18_tr_editor_slide_description',
										className: 	'gbt_18_tr_editor_slide_description',
									},
									el(
										RichText,
										{
											key: 'gbt_18_tr_editor_slide_description_input',
											style:
											{
												color: attributes.textColor,
												fontSize: attributes.descriptionSize + 'px'
											},
											className: 'gbt_18_tr_editor_slide_description_input',
											format: 'string',
											tagName: 'p',
											value: attributes.description,
											allowedFormats: [],
											placeholder: i18n.__( 'Add Subtitle', 'the-retailer-extender' ),
											onChange: function( newSubtitle) {
												props.setAttributes( { description: newSubtitle } );
											}
										}
									),
								),
								!! attributes.slideButton && el(
									'div',
									{
										key: 		'gbt_18_tr_editor_slide_button',
										className: 	'gbt_18_tr_editor_slide_button',
									},
									el(
										RichText,
										{
											key: 'gbt_18_tr_editor_slide_button_input',
											style:
											{
												color: attributes.buttonTextColor,
												backgroundColor: attributes.buttonBgColor,
											},
											className: 'gbt_18_tr_editor_slide_button_input',
											format: 'string',
											tagName: 'h5',
											value: attributes.buttonText,
											allowedFormats: [],
											placeholder: i18n.__( 'Button Text', 'the-retailer-extender' ),
											onChange: function( newText) {
												props.setAttributes( { buttonText: newText } );
											}
										}
									),
								),
							),
						),
					),
				),
			];
		},
		getEditWrapperProps: function( attributes ) {
            return {
            	'data-tab': attributes.tabNumber
            };
        },
		save: function( props ) {

			let attributes = props.attributes;

			return el( 'div',
				{
					key: 		'gbt_18_tr_swiper_slide',
					className: 	'gbt_18_tr_swiper_slide swiper-slide ' + attributes.alignment + '-align',
					style:
					{
						backgroundColor: attributes.backgroundColor,
						backgroundImage: 'url(' + attributes.imgURL + ')',
						color: attributes.textColor
					}
				},
				! attributes.slideButton && attributes.slideURL != '' && el( 'a',
					{
						key: 		'gbt_18_tr_slide_fullslidelink',
						className: 	'fullslidelink',
						href: 		attributes.slideURL,
						rel: 		'noopener noreferrer'
					}
				),
				el( 'div',
					{
						key: 					'gbt_18_tr_slide_content',
						className: 				'gbt_18_tr_slide_content slider-content',
						'data-swiper-parallax': '-1000'
					},
					el( 'div',
						{
							key: 		'gbt_18_tr_slide_content_wrapper',
							className: 	'gbt_18_tr_slide_content_wrapper slider-content-wrapper'
						},
						attributes.title != '' && el( 'h2',
							{
								key: 		'gbt_18_tr_slide_title',
								className: 	'gbt_18_tr_slide_title slide-title',
								style:
								{
									fontSize: attributes.titleSize,
									color: attributes.textColor
								},
								dangerouslySetInnerHTML: { __html: attributes.title },
							},
						),
						attributes.description != '' && el( 'p',
							{
								key: 		'gbt_18_tr_slide_description',
								className: 	'gbt_18_tr_slide_description slide-description',
								style:
								{
									fontSize: attributes.descriptionSize,
									color: attributes.textColor
								},
								dangerouslySetInnerHTML: { __html: attributes.description },
							},
						),
						!! attributes.slideButton && attributes.buttonText != '' && el( 'a',
							{
								key: 		'gbt_18_tr_slide_button',
								className: 	'gbt_18_tr_slide_button button',
								href: attributes.slideURL,
								style:
								{
									backgroundColor: attributes.buttonBgColor,
									color: attributes.buttonTextColor
								},
								dangerouslySetInnerHTML: { __html: attributes.buttonText },
							},
						)
					)
				)
			);
		},
		deprecated: [
			{
				attributes: attributes,

				save: function( props ) {

					let attributes = props.attributes;

					return el( 'div',
						{
							key: 		'gbt_18_tr_swiper_slide',
							className: 	'gbt_18_tr_swiper_slide swiper-slide ' + attributes.alignment + '-align',
							style:
							{
								backgroundColor: attributes.backgroundColor,
								backgroundImage: 'url(' + attributes.imgURL + ')',
								color: attributes.textColor
							}
						},
						! attributes.slideButton && attributes.slideURL != '' && el( 'a',
							{
								key: 		'gbt_18_tr_slide_fullslidelink',
								className: 	'fullslidelink',
								href: 		attributes.slideURL,
								'target': 	'_blank',
								rel: 		'noopener noreferrer'
							}
						),
						el( 'div',
							{
								key: 					'gbt_18_tr_slide_content',
								className: 				'gbt_18_tr_slide_content slider-content',
								'data-swiper-parallax': '-1000'
							},
							el( 'div',
								{
									key: 		'gbt_18_tr_slide_content_wrapper',
									className: 	'gbt_18_tr_slide_content_wrapper slider-content-wrapper'
								},
								attributes.title != '' && el( 'h2',
									{
										key: 		'gbt_18_tr_slide_title',
										className: 	'gbt_18_tr_slide_title slide-title',
										style:
										{
											fontSize: attributes.titleSize,
											color: attributes.textColor
										},
										dangerouslySetInnerHTML: { __html: attributes.title },
									},
								),
								attributes.description != '' && el( 'p',
									{
										key: 		'gbt_18_tr_slide_description',
										className: 	'gbt_18_tr_slide_description slide-description',
										style:
										{
											fontSize: attributes.descriptionSize,
											color: attributes.textColor
										},
										dangerouslySetInnerHTML: { __html: attributes.description },
									},
								),
								!! attributes.slideButton && attributes.buttonText != '' && el( 'a',
									{
										key: 		'gbt_18_tr_slide_button',
										className: 	'gbt_18_tr_slide_button button',
										href: attributes.slideURL,
										style:
										{
											backgroundColor: attributes.buttonBgColor,
											color: attributes.buttonTextColor
										},
										dangerouslySetInnerHTML: { __html: attributes.buttonText },
									},
								)
							)
						)
					);
				},
			}
		]
	} );

} )(
	window.wp.blocks,
	window.wp.components,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element
);
