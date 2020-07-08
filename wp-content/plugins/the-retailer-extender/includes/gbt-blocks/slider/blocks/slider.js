( function( blocks, components, editor, i18n, element ) {

	const el = element.createElement;

	/* Blocks */
	const registerBlockType = wp.blocks.registerBlockType;

	const {
		Button,
		PanelBody,
		TabPanel,
		TextControl,
		SelectControl,
		ToggleControl,
		RangeControl,
		SVG,
		Path,
		Circle,
		Polygon,
		G,
	} = wp.components;

	const {
		InspectorControls,
		InnerBlocks,
	} = wp.blockEditor;

	var attributes = {
		fullHeight: {
			type: 'boolean',
			default: false
		},
		customHeight: {
			type: 'number',
			default: '800',
		},
		slides: {
			type: 'number',
			default: '3',
		},
		pagination: {
			type: 'boolean',
			default: true
		},
		arrows: {
			type: 'boolean',
			default: true
		},
		slideURL: {
			type: 'string',
			default: '#'
		},
		activeTab: {
			type: 'number',
			default: '1'
		}
	};

	/* Register Block */
	registerBlockType( 'getbowtied/tr-slider', {
		title: i18n.__( 'Slider', 'the-retailer-extender' ),
		icon:
			el( SVG, { xmlns:'http://www.w3.org/2000/svg', viewBox:'0 0 48 48' },
				el( G, {},
					el( Path,
						{
							d:'M 20 20 L 4 20 C 3.447266 20 3 19.552734 3 19 L 3 16 L 21 16 L 21 19 C 21 19.552734 20.552734 20 20 20 Z M 20 20 ',
							transform: 'matrix(2,0,0,2,0,0)',
							style: {
								'fill':'none',
								'strokeWidth':'2',
								'strokeLinecap':'butt',
								'strokeLinejoin':'miter',
								'stroke':'#555d66',
								'strokeOpacity':'1',
								'strokeMiterlimit':'10'
							}
						}
					),
					el( Path,
						{
							d:'M 5 16 L 5 9 C 5 8.447266 5.447266 8 6 8 L 18 8 C 18.552734 8 19 8.447266 19 9 L 19 16 M 6 5 C 6 4.447266 6.447266 4 7 4 L 17 4 C 17.552734 4 18 4.447266 18 5 ',
							transform: 'matrix(2,0,0,2,0,0)',
							style: {
								'fill':'none',
								'strokeWidth':'2',
								'strokeLinecap':'butt',
								'strokeLinejoin':'miter',
								'stroke':'#555d66',
								'strokeOpacity':'1',
								'strokeMiterlimit':'10'
							}
						}
					),
					el( Path,
						{
							d:'M 34 30 L 27.738281 22 L 22.65625 28.152344 L 18.957031 24 L 14 30 Z M 34 30 ',
							style: { 'fill': '#555d66'}
						}
					),
				),
			),
		category: 'theretailer',
		supports: {
			align: [ 'center', 'wide', 'full' ],
		},
		attributes: attributes,

		edit: function( props ) {

			var attributes = props.attributes;

			function getTabs() {

				let tabs = [];

				let icons = [
					{ 'tab': '1', 'code': 'M3 5H1v16c0 1.1.9 2 2 2h16v-2H3V5zm11 10h2V5h-4v2h2v8zm7-14H7c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm0 16H7V3h14v14z' },
					{ 'tab': '2', 'code': 'M3 5H1v16c0 1.1.9 2 2 2h16v-2H3V5zm18-4H7c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm0 16H7V3h14v14zm-4-4h-4v-2h2c1.1 0 2-.89 2-2V7c0-1.11-.9-2-2-2h-4v2h4v2h-2c-1.1 0-2 .89-2 2v4h6v-2z' },
					{ 'tab': '3', 'code': 'M21 1H7c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm0 16H7V3h14v14zM3 5H1v16c0 1.1.9 2 2 2h16v-2H3V5zm14 8v-1.5c0-.83-.67-1.5-1.5-1.5.83 0 1.5-.67 1.5-1.5V7c0-1.11-.9-2-2-2h-4v2h4v2h-2v2h2v2h-4v2h4c1.1 0 2-.89 2-2z' },
					{ 'tab': '4', 'code': 'M3 5H1v16c0 1.1.9 2 2 2h16v-2H3V5zm12 10h2V5h-2v4h-2V5h-2v6h4v4zm6-14H7c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm0 16H7V3h14v14z' },
					{ 'tab': '5', 'code': 'M21 1H7c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm0 16H7V3h14v14zM3 5H1v16c0 1.1.9 2 2 2h16v-2H3V5zm14 8v-2c0-1.11-.9-2-2-2h-2V7h4V5h-6v6h4v2h-4v2h4c1.1 0 2-.89 2-2z' },
					{ 'tab': '6', 'code': 'M3 5H1v16c0 1.1.9 2 2 2h16v-2H3V5zm18-4H7c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm0 16H7V3h14v14zm-8-2h2c1.1 0 2-.89 2-2v-2c0-1.11-.9-2-2-2h-2V7h4V5h-4c-1.1 0-2 .89-2 2v6c0 1.11.9 2 2 2zm0-4h2v2h-2v-2z' },
				];

				for( let i = 1; i <= attributes.slides; i++ ) {
					tabs.push(
						el( 'a',
							{
				                key: 'slide' + i,
				                className: 'slide-tab slide-' + i,
				                'data-tab': i,
				                onClick: function() {
                    				props.setAttributes({ activeTab: i });
                                },
				            },
				            el( SVG,
				            	{
				            		xmlns:"http://www.w3.org/2000/svg",
				            		viewBox:"0 0 24 24"
				            	},
				            	el( Path,
				            		{
				            			d: icons[i-1]['code']
				            		}
				            	)
				            ),
			            )
					);
				}

				return tabs;
			}

			function getTemplates() {
				let n = [];

                for ( let i = 1; i <= attributes.slides; i++ ) {
                	n.push(["getbowtied/tr-slide", {
                        tabNumber: i
                    }]);
                }

                return n;
			}

			return [
				el(
					InspectorControls,
					{
						key: 'gbt_18_tr_slider_inspector'
					},
					el(
						'div',
						{
							className: 'main-inspector-wrapper',
						},
						el(
							ToggleControl,
							{
								key: "gbt_18_tr_slider_full_height",
								label: i18n.__( 'Full Height', 'the-retailer-extender' ),
								checked: attributes.fullHeight,
								onChange: function() {
									props.setAttributes( { fullHeight: ! attributes.fullHeight } );
								},
							}
						),
						attributes.fullHeight === false &&
						el(
							RangeControl,
							{
								key: "gbt_18_tr_slider_custom_height",
								value: attributes.customHeight,
								allowReset: false,
								initialPosition: 800,
								min: 100,
								max: 1000,
								label: i18n.__( 'Custom Desktop Height', 'the-retailer-extender' ),
								onChange: function( newNumber ) {
									props.setAttributes( { customHeight: newNumber } );
								},
							}
						),
						el(
							RangeControl,
							{
								key: "gbt_18_tr_slider_slides",
								value: attributes.slides,
								allowReset: false,
								initialPosition: 3,
								min: 1,
								max: 6,
								label: i18n.__( 'Number of Slides', 'the-retailer-extender' ),
								onChange: function( newNumber ) {
									props.setAttributes( { slides: newNumber } );
									props.setAttributes( { activeTab: '1' } );
								},
							}
						),
						el(
							ToggleControl,
							{
								key: "gbt_18_tr_slider_pagination",
	              				label: i18n.__( 'Pagination Bullets', 'the-retailer-extender' ),
	              				checked: attributes.pagination,
	              				onChange: function() {
									props.setAttributes( { pagination: ! attributes.pagination } );
								},
							}
						),
						el(
							ToggleControl,
							{
								key: "gbt_18_tr_slider_arrows",
	              				label: i18n.__( 'Navigation Arrows', 'the-retailer-extender' ),
	              				checked: attributes.arrows,
	              				onChange: function() {
									props.setAttributes( { arrows: ! attributes.arrows } );
								},
							}
						),
					),
				),
				el( 'div',
					{
						key: 				'gbt_18_tr_editor_slider_wrapper',
						className: 			'gbt_18_tr_editor_slider_wrapper',
						'data-tab-active': 	attributes.activeTab
					},
					el( 'div',
						{
							key: 		'gbt_18_tr_editor_slider_tabs',
							className: 	'gbt_18_tr_editor_slider_tabs'
						},
						getTabs()
					),
					el(
						InnerBlocks,
						{
							key: 'gbt_18_tr_editor_slider_inner_blocks ',
							template: getTemplates(),
	                        templateLock: "all",
	            			allowedBlocksNames: ["getbowtied/tr-slide"]
						},
					),
				),
			];
		},

		save: function( props ) {
			attributes = props.attributes;
			return el(
				'div',
				{
					key: 'gbt_18_tr_slider_wrapper',
					className: 'gbt_18_tr_slider wp-block-gbt-slider'
				},
				el(
					'div',
					{
						key: 'gbt_18_tr_slider_container',
						className: attributes.fullHeight ? 'gbt_18_tr_slider_container swiper-container full_height' : 'gbt_18_tr_slider_container swiper-container',
						style:
						{
							height: attributes.customHeight + 'px'
						}
					},
					el(
						'div',
						{
							key: 'swiper-wrapper',
							className: 'swiper-wrapper'
						},
						el( InnerBlocks.Content, { key: 'slide-content' } )
					),
					!! attributes.arrows && el(
						'div',
						{
							key: 'swiper-button-prev',
							className: 'swiper-button-prev'
						},
						el( SVG,
							{
								className: 'left-arrow-svg',
								xmlns:'http://www.w3.org/2000/svg',
								viewBox:'0 0 24 24',
								style:
								{
									fill: attributes.arrowsColor
								}
							},
							el( Path, { d:'M 10 4.9296875 L 2.9296875 12 L 10 19.070312 L 11.5 17.570312 L 6.9296875 13 L 21 13 L 21 11 L 6.9296875 11 L 11.5 6.4296875 L 10 4.9296875 z' } )
						),
					),
					!! attributes.arrows && el(
						'div',
						{
							key: 'swiper-button-next',
							className: 'swiper-button-next'
						},
						el( SVG,
							{
								className: 'right-arrow-svg',
								xmlns:'http://www.w3.org/2000/svg',
								viewBox:'0 0 24 24',
								style:
								{
									fill: attributes.arrowsColor
								}
							},
							el( Path, { d:'M 14 4.9296875 L 12.5 6.4296875 L 17.070312 11 L 3 11 L 3 13 L 17.070312 13 L 12.5 17.570312 L 14 19.070312 L 21.070312 12 L 14 4.9296875 z' } )
						),
					),
					!! attributes.pagination && el(
						'div',
						{
							key: 'shortcode-slider-pagination',
							className: 'quickview-pagination shortcode-slider-pagination gbt_18_tr_slider_pagination'
						}
					)
				)
			);
		},

		deprecated: [
			{
				attributes: attributes,

				save: function( props ) {
					attributes = props.attributes;
					return el(
						'div',
						{
							key: 'gbt_18_tr_slider_wrapper',
							className: 'gbt_18_tr_slider wp-block-gbt-slider'
						},
						el(
							'div',
							{
								key: 'gbt_18_tr_slider_container',
								className: attributes.fullHeight ? 'gbt_18_tr_slider_container swiper-container full_height' : 'gbt_18_tr_slider_container swiper-container',
								style:
								{
									height: attributes.customHeight + 'px'
								}
							},
							el(
								'div',
								{
									key: 'swiper-wrapper',
									className: 'swiper-wrapper'
								},
								el( InnerBlocks.Content, { key: 'slide-content' } )
							),
							!! attributes.arrows && el(
								'div',
								{
									key: 'swiper-button-prev',
									className: 'swiper-button-prev'
								},
								el( SVG,
									{
										className: 'left-arrow-svg',
										xmlns:'http://www.w3.org/2000/svg',
										viewBox:'0 0 24 24',
										style:
										{
											fill: attributes.arrowsColor
										}
									},
									el( Path, { d:'M11.67 3.87L9.9 2.1 0 12l9.9 9.9 1.77-1.77L3.54 12z' } )
								),
							),
							!! attributes.arrows && el(
								'div',
								{
									key: 'swiper-button-next',
									className: 'swiper-button-next'
								},
								el( SVG,
									{
										className: 'right-arrow-svg',
										xmlns:'http://www.w3.org/2000/svg',
										viewBox:'0 0 24 24',
										style:
										{
											fill: attributes.arrowsColor
										}
									},
									el( Path, { d:'M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z' } )
								),
							),
							!! attributes.pagination && el(
								'div',
								{
									key: 'shortcode-slider-pagination',
									className: 'quickview-pagination shortcode-slider-pagination gbt_18_tr_slider_pagination'
								}
							)
						)
					);
				},
			}
		],
	} );

} )(
	window.wp.blocks,
	window.wp.components,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element
);
