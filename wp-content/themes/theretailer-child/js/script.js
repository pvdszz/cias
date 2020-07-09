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
            console.log(this.responseText);
            var data = JSON.parse(this.responseText);
            var adult_html = "";
            var total_html = ""
            for (var a = 0; a < data.length; a++) {
                var adult = data[a].price_for_adult;
                // var child = data[a].price_for_child * 0;
                var total = adult;
                adult_html += '<span id="abcdef"> ( 1 ) x' + adult + '</span>';
                // html += '<td id="abcdefg">' + child + "</td>";
                total_html += '<span id="abcdefgh">' + total + "</span>";
            }
            document.getElementById("adult-field").innerHTML += adult_html;
            document.getElementById("total-field").innerHTML += total_html;
        } else {
            console.log("!");

        }
    }


    jQuery('<div class="quantity-button quantity-up-adult">+</div><div class="quantity-button quantity-down-adult">-</div>').insertAfter('.quantity-num-adult');
    jQuery('<div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div>').insertAfter('.quantity-num-child');
    jQuery('.form-booking li').each(function() {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUpAdult = spinner.find('.quantity-up-adult'),
            btnDownAdult = spinner.find('.quantity-down-adult'),
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
                    // console.log(this.responseText);
                    var data = JSON.parse(this.responseText);
                    // console.log(data);
                    var _adult = document.getElementById("abcdef");
                    var _child = document.getElementById("abcdefg");
                    var _total = document.getElementById("abcdefgh");
                    for (var a = 0; a < data.length; a++) {
                        var adult = data[a].price_for_adult;
                        // var child = data[a].price_for_child * newVal;
                        var newTotal = adult;
                        _adult.innerHTML = '( ' + newVal + ' )' + ' x ' + adult;
                        // _child.innerHTML = child;
                        _total.innerHTML = newVal * newTotal;
                    }
                } else {
                    console.log("!");

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
                    console.log(this.responseText);
                    var data = JSON.parse(this.responseText);
                    console.log(data);
                    var _adult = document.getElementById("abcdef");
                    // var _child = document.getElementById("abcdefg");
                    var _total = document.getElementById("abcdefgh");
                    for (var a = 0; a < data.length; a++) {
                        var adult = data[a].price_for_adult;
                        // var child = data[a].price_for_child / newVal;
                        var newTotal = adult * newVal;
                        _adult.innerHTML = '( ' + newVal + ' )' + ' x ' + adult;
                        // _child.innerHTML = child;
                        _total.innerHTML = newTotal;
                    }
                } else {
                    console.log("!");

                }
            }
        });

    });


});