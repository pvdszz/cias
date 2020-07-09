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
            var child_html = "";
            for (var a = 0; a < data.length; a++) {
                var adult = data[a].price_for_adult;
                var child = data[a].price_for_child * 0;
                var total = adult;
                adult_html += '<span id="adult-price"> ( 1 ) x' + adult + '</span>';
                child_html += '<span id="child-price">' + child + "</span>";
                total_html += '<span id="total-price">' + total + "</span>";
            }
            document.getElementById("adult-field").innerHTML += adult_html;
            document.getElementById("child-field").innerHTML += child_html;
            document.getElementById("total-field").innerHTML += total_html;
        } else {
            console.log("!");

        }
    }
    jQuery('<div class="quantity-button quantity-up-adult">+</div><div class="quantity-button quantity-down-adult">-</div>').insertAfter('.quantity-num-adult');
    jQuery('<div class="quantity-button quantity-up-child">+</div><div class="quantity-button quantity-down-child">-</div>').insertAfter('.quantity-num-child');
    jQuery('.form-booking li').each(function() {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUpAdult = spinner.find('.quantity-up-adult'),
            btnUpChild = spinner.find('.quantity-up-child'),
            btnDownAdult = spinner.find('.quantity-down-adult'),
            btnDownChild = spinner.find('.quantity-down-child'),
            extra = spinner.find('.extra')
            min = input.attr('min'),
            max = input.attr('max');

        btnUpAdult.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
                console.log(newVal);
            }
            spinner.find('input[type="number"]').val(newVal);
            spinner.find('input[type="number"]').trigger("change");
            extra.parent().append("<ul class='extra'><li><label for='name'>Họ tên: </label><input type='text' name='name' id='name' required/></li><li><label for='age'>Tuổi: </label><input type='text' name='age' id='age' required/></li><li><label for='sex'>Giới tính: </label><input type='text' name='sex id='sex' required/></li></ul>");
            ajax.open(method, url, asynchronous);
            // sending ajax request
            ajax.send();
            // receiving response from functions.php
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    var _adult = document.getElementById("adult-price");
                    var _total = document.getElementById("total-price");
                    var _child =  parseInt($('#child-price').text());
                    for (var a = 0; a < data.length; a++) {
                        var adult = data[a].price_for_adult;
                        var newTotal = adult;
                        _adult.innerHTML = '( ' + newVal + ' )' + ' x ' + adult;
                        _total.innerHTML = (newVal * newTotal) + _child;
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
            extra.parent().append("<ul class='extra'><li><label for='name'>Họ tên: </label><input type='text' name='name' id='name' required/></li><li><label for='age'>Tuổi: </label><input type='text' name='age' id='age' required/></li><li><label for='sex'>Giới tính: </label><input type='text' name='sex id='sex' required/></li></ul>");
            ajax.open(method, url, asynchronous);
            // sending ajax request
            ajax.send();
            // receiving response from functions.php
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                 
                    var _child = document.getElementById("child-price");
                    var _newTotal = document.getElementById("total-price");
                    var _adult_quantity = $('.quantity-num-adult').val();
                    for (var a = 0; a < data.length; a++) {
                        var adult = data[a].price_for_adult;
                        var child = data[a].price_for_child * newVal;
                        _child.innerHTML =  child;
                        var total  = child + (adult * _adult_quantity);
                        _newTotal.innerHTML =  total;
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
                    console.log(data);
                    var _adult = document.getElementById("adult-price");
                    var _child_quantity = $(".quantity-num-child").val();
                    var _total = document.getElementById("total-price");
                    for (var a = 0; a < data.length; a++) {
                        var adult = data[a].price_for_adult;
                        var child = data[a].price_for_child;
                        var newTotal = (adult * newVal) + (child * _child_quantity);
                        _adult.innerHTML = '( ' + newVal + ' )' + ' x ' + adult;
                        // _child.innerHTML = child;
                        _total.innerHTML = newTotal;
                    }
                }
            }
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
            spinner.find('.extra:last-child').remove();

            ajax.open(method, url, asynchronous);
            // sending ajax request
            ajax.send();

            // receiving response from functions.php
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    var data = JSON.parse(this.responseText);
                    console.log(data);
                    var _child = document.getElementById("child-price");
                    var _newTotal = document.getElementById("total-price");
                    var _adult_quantity = $('.quantity-num-adult').val();
                    for (var a = 0; a < data.length; a++) {
                        var adult = data[a].price_for_adult;
                        var child = data[a].price_for_child;
                        _child.innerHTML = '( ' + newVal + ' )' + ' x ' + child;
                        var total = (adult * _adult_quantity) + (child * newVal);
                        _newTotal.innerHTML =  total;
                    }
                }
            }
        });
    });


});