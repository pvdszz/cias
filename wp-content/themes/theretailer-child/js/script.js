jQuery(document).ready(function($) {
    jQuery('<div class="quantity-button quantity-up-adult quantity-up-left">+</div><div class="quantity-button quantity-down-adult quantity-down-right">-</div>').insertAfter('.quantity-num-adult');
    jQuery('<div class="quantity-button quantity-up-kids  quantity-up-left">+</div><div class="quantity-button quantity-down-kids quantity-down-right">-</div>').insertAfter('.quantity-num-kids');
    jQuery('<div class="quantity-button quantity-up-childs quantity-up-left">+</div><div class="quantity-button quantity-down-childs quantity-down-right">-</div>').insertAfter('.quantity-num-childs');
    jQuery('.form-booking li').each(function() {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUpAdult = spinner.find('.quantity-up-adult'),
            btnDownAdult = spinner.find('.quantity-down-adult'),
            btnUpKids = spinner.find('.quantity-up-kids'),
            btnDownKids = spinner.find('.quantity-down-kids'),
            btnUpChild = spinner.find('.quantity-up-childs'),
            btnDownChild = spinner.find('.quantity-down-childs'),
            extra = spinner.find('.extra')
        min = input.attr('min'),
            max = input.attr('max');

        btnUpAdult.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find('input[type="number"]').val(newVal);
            spinner.find('input[type="number"]').trigger("change");
        });
        btnDownAdult.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            /* -------------------------------------------------- Heirarchy Loop */
            spinner.find('input[type="number"]').val(newVal);
            spinner.find('input[type="number"]').trigger("change");
            spinner.find('.extra:last-child').remove();
        });
        btnUpKids.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find('input[type="number"]').val(newVal);
            spinner.find('input[type="number"]').trigger("change");
            extra.parent().append("<ul class='extra'><li><label for='name'>Họ tên: </label><input type='text' name='name' id='name' required/></li><li><label for='age'>Tuổi: </label><input type='text' name='age' id='age' required/></li><li><label for='email'>Email: </label><input type='text' name='email id='email' required/></li></ul>");
      
        });
        btnDownKids.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            /* -------------------------------------------------- Heirarchy Loop */
            spinner.find('input[type="number"]').val(newVal);
            spinner.find('input[type="number"]').trigger("change");
            spinner.find('.extra:last-child').remove();
        });
        btnUpChild.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find('input[type="number"]').val(newVal);
            spinner.find('input[type="number"]').trigger("change");
        });
        btnDownChild.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            /* -------------------------------------------------- Heirarchy Loop */
            spinner.find('input[type="number"]').val(newVal);
            spinner.find('input[type="number"]').trigger("change");
        });

    });


});