jQuery(document).ready(function($) {
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "http://localhost/cias/wp-content/themes/theretailer-child/getData.php";
    var asynchronous = true;

    ajax.open(method, url, asynchronous);
    // sending ajax request
    ajax.send();

    // receiving response from functions.php
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            var adult_html = "";
            var total_html = "";
            var kids_html = "";
            for (var a = 0; a < data.length; a++) {
                var adult = data[a].price_for_adult;
                var kids = data[a].price_for_child * 0;
                var total = adult;
                adult_html += '<span id="adult-price"> ( 1 ) x' + adult + '</span>';
                kids_html += '<span id="kids-price">' + kids + "</span>";
                total_html += '<span id="total-price" class="order_total">' + total + "</span>";
            }
            document.getElementById("adult-field").innerHTML += adult_html;
            document.getElementById("kids-field").innerHTML += kids_html;
            document.getElementById("total-field").innerHTML += total_html;
        }
    }
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
            extra.parent().append("<ul class='extra'><li><label for='name'>Họ tên: </label><input type='text' name='name' id='name' required/></li><li><label for='age'>Tuổi: </label><input type='text' name='age' id='age' required/></li><li><label for='email'>Email: </label><input type='text' name='email' id='email' required/></li></ul>");
            ajax.open(method, url, asynchronous);
            // sending ajax request
            ajax.send();
            // receiving response from functions.php
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    var _adult = document.getElementById("adult-price");
                    var _total = document.getElementById("total-price");
                    var _kids_quantity = $('.quantity-num-kids').val();
                    for (var a = 0; a < data.length; a++) {
                        var adult = data[a].price_for_adult;
                        var kids = data[a].price_for_child * _kids_quantity;
                        var newTotal = adult;
                        _adult.innerHTML = '( ' + newVal + ' )' + ' x ' + adult;
                        _total.innerHTML = (newVal * newTotal) + kids;
                    }
                }
            }
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

            ajax.open(method, url, asynchronous);
            // sending ajax request
            ajax.send();

            // receiving response from functions.php
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    var _adult = document.getElementById("adult-price");
                    var _kids_quantity = $(".quantity-num-kids").val();
                    var _total = document.getElementById("total-price");
                    for (var a = 0; a < data.length; a++) {
                        var adult = data[a].price_for_adult;
                        var kids = data[a].price_for_child;
                        var newTotal = (adult * newVal) + (kids * _kids_quantity);
                        _adult.innerHTML = '( ' + newVal + ' )' + ' x ' + adult;
                        // _child.innerHTML = child;
                        _total.innerHTML = newTotal;
                    }
                }
            }
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
            ajax.open(method, url, asynchronous);
            // sending ajax request
            ajax.send();
            // receiving response from functions.php
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);

                    var _kids = document.getElementById("kids-price");
                    var _newTotal = document.getElementById("total-price");
                    var _adult_quantity = $('.quantity-num-adult').val();
                    for (var a = 0; a < data.length; a++) {
                        var adult = data[a].price_for_adult;
                        var kids = data[a].price_for_child;
                        _kids.innerHTML = '( ' + newVal + ' )' + ' x ' + kids;
                        var total = (kids * newVal) + (adult * _adult_quantity);
                        _newTotal.innerHTML = total;
                    }
                }
            }
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

            ajax.open(method, url, asynchronous);
            // sending ajax request
            ajax.send();

            // receiving response from functions.php
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    var _kids = document.getElementById("kids-price");
                    var _newTotal = document.getElementById("total-price");
                    var _adult_quantity = $('.quantity-num-adult').val();
                    for (var a = 0; a < data.length; a++) {
                        var adult = data[a].price_for_adult;
                        var kids = data[a].price_for_child;
                        _kids.innerHTML = '( ' + newVal + ' )' + ' x ' + kids;
                        var total = (adult * _adult_quantity) + (kids * newVal);
                        _newTotal.innerHTML = total;
                    }
                }
            }
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

    $('.single_add_to_cart_button').click(function() {
        var order_total = [];
        $('.order_total').each(function() {
            order_total.push($(this).text());
        });
        $.ajax({
            url: "http://localhost/cias/wp-content/themes/theretailer-child/insert.php",
            method: "POST",
            data: { order_total:order_total },
            success: function(data) {
                console.log(data);
                fetch_item_data();
            }
        });
    });

    function fetch_item_data() {
        $.ajax({
            url: "http://localhost/cias/wp-content/themes/theretailer-child/fetch.php",
            method: "POST",
            success: function(data) {
                $('#order-total').html(data);
            }
        })
    }
    fetch_item_data();

});