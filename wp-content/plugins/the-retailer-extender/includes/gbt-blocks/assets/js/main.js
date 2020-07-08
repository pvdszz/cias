( function( blocks ) {
	var blockCategories = blocks.getCategories();
	blockCategories.unshift({ 'slug': 'theretailer', 'title': 'The Retailer Blocks'});
	blocks.setCategories(blockCategories);
})(
	window.wp.blocks
);