jQuery(document).ready(function($){
    $('.has-extra input').on('keydown, keyup', function () {
        //get a reference to the text input value
        var newVal = $(this).val();
        if(newVal >= 2){
            $(this).siblings($(".extra")).show( "slow" );
        }else{
            $(this).siblings($(".extra")).hide( "slow" );
        }
      });



        jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity-num');
        jQuery('.form-booking li').each(function() {
          var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            extra = spinner.find('.extra')
            min = input.attr('min'),
            max = input.attr('max');
        
          btnUp.click(function($) {
            var oldValue = parseFloat(input.val());
        
            if (oldValue >= max) {
              var newVal = oldValue;
            } else {
              var newVal = oldValue + 1;
            }
            if(newVal >= 2){
               
                extra.show( "slow" );
            }else{
                extra.hide( "slow" );  
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
          });
        
          btnDown.click(function($) {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
              var newVal = oldValue;
            } else {
              var newVal = oldValue - 1;
            }
            if(newVal >= 2){
               
                extra.show( "slow" );
            }else{
                extra.hide( "slow" );  
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
          });
        
        });

    
});
