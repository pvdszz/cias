jQuery(document).ready(function($) {
    $('.has-extra input').on('keydown, keyup', function() {
        //get a reference to the text input value
        var newVal = $(this).val();
        if (newVal >= 2) {
            $(this).parent().siblings(".extra").show("slow");
        } else {
            $(this).parent().siblings(".extra").hide("slow");
        }
    });



    jQuery('<div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div>').insertAfter('.quantity-num');
    jQuery('.form-booking li').each(function() {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            extra = spinner.find('.extra')
            min = input.attr('min'),
            max = input.attr('max');

        btnUp.click(function() {

            var oldValue = parseFloat(input.val());

            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
           
            spinner.find('input[type="number"]').val(newVal);
            spinner.find('input[type="number"]').trigger("change");
            extra.parent().append("<ul class='extra'><li><label for='name'>Họ tên: </label><input type='text' name='name' id='name' required/></li><li><label for='age'>Tuổi: </label><input type='text' name='age' id='age' required/></li><li><label for='sex'>Giới tính: </label><input type='text' name='sex id='sex' required/></li></ul>");

        });

        btnDown.click(function() {
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

    });


});