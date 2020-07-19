/*
 currency.js - v2.0.0
 http://scurker.github.io/currency.js

 Copyright (c) 2020 Jason Wilson
 Released under MIT license
*/

(function(e,g){"object"===typeof exports&&"undefined"!==typeof module?module.exports=g():"function"===typeof define&&define.amd?define(g):(e=e||self,e.currency=g())})(this,function(){function e(b,a){if(!(this instanceof e))return new e(b,a);a=Object.assign({},m,a);var d=Math.pow(10,a.precision);this.intValue=b=g(b,a);this.value=b/d;a.increment=a.increment||1/d;a.groups=a.useVedic?n:p;this.s=a;this.p=d}function g(b,a){var d=2<arguments.length&&void 0!==arguments[2]?arguments[2]:!0;var c=a.decimal;
    var h=a.errorOnInvalid,k=a.fromCents,l=Math.pow(10,a.precision),f="number"===typeof b;if(f||b instanceof e)c=f?b:b.value;else if("string"===typeof b)h=new RegExp("[^-\\d"+c+"]","g"),c=new RegExp("\\"+c,"g"),c=(c=b.replace(/\((.*)\)/,"-$1").replace(h,"").replace(c,"."))||0;else{if(h)throw Error("Invalid Input");c=0}k?c=Math.trunc(c):(c=(c*l).toFixed(4),c=d?Math.round(c):c);return c}var m={symbol:"VNĐ",separator:",",decimal:".",errorOnInvalid:!1,precision:0,pattern:"!#",negativePattern:"-!#",format:function(b,
    a){var d=a.pattern,c=a.negativePattern,h=a.symbol,k=a.separator,l=a.decimal;a=a.groups;var f=(""+b).replace(/^-/,"").split("."),q=f[0];f=f[1];return(0<=b.value?d:c).replace("!",h).replace("#",q.replace(a,"$1"+k)+(f?l+f:""))},fromCents:!1},p=/(\d)(?=(\d{3})+\b)/g,n=/(\d)(?=(\d\d)+\d\b)/g;e.prototype={add:function(b){var a=this.s,d=this.p;return e((this.intValue+g(b,a))/d,a)},subtract:function(b){var a=this.s,d=this.p;return e((this.intValue-g(b,a))/d,a)},multiply:function(b){var a=this.s;return e(this.intValue*
    b/Math.pow(10,a.precision),a)},divide:function(b){var a=this.s;return e(this.intValue/g(b,a,!1),a)},distribute:function(b){for(var a=this.intValue,d=this.p,c=this.s,h=[],k=Math[0<=a?"floor":"ceil"](a/b),l=Math.abs(a-k*b);0!==b;b--){var f=e(k/d,c);0<l--&&(f=0<=a?f.add(1/d):f.subtract(1/d));h.push(f)}return h},dollars:function(){return~~this.value},cents:function(){return~~(this.intValue%this.p)},format:function(b){var a=this.s;return"function"===typeof b?b(this,a):a.format(this,Object.assign({},a,
    b))},toString:function(){var b=this.s,a=b.increment;return(Math.round(this.intValue/this.p/a)*a).toFixed(b.precision)},toJSON:function(){return this.value}};return e});
jQuery(document).ready(function($) {
   booking();

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
                alert(data);
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
function booking(){
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
            var adult =  data[a].price_for_adult;
            var kids = currency(data[a].price_for_child * 0, {pattern: `# !`}).format();
            var total = adult;
            adult_html += '<span id="adult-price">' + adult + '</span>';
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
                var _kids_quantity = document.getElementById('quantity-num-kids').value;
                console.log(_kids_quantity);
                
                for (var a = 0; a < data.length; a++) {
                    var adult = data[a].price_for_adult;
                    var kids = data[a].price_for_child * _kids_quantity;
                    var newTotal = adult;
                    _adult.innerHTML = '( ' + newVal + ' )' + ' x ' + currency( adult,{pattern: `# !`}).format() ;
                    _total.innerHTML = currency(((newVal * newTotal) + kids),{pattern: `# !`}).format() ;
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
                var _kids_quantity = document.getElementById("quantity-num-kids").value;
                var _total = document.getElementById("total-price");
                for (var a = 0; a < data.length; a++) {
                    var adult = data[a].price_for_adult;
                    var kids = data[a].price_for_child;
                    var newTotal = (adult * newVal) + (kids * _kids_quantity);
                    _adult.innerHTML = '( ' + newVal + ' )' + ' x ' + currency(adult,{pattern:`# !`}).format() ;
                    _total.innerHTML =currency(newTotal,{pattern:`# !`}).format() ;
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
                var _adult_quantity = document.getElementById('quantity-num-adult').value;
                for (var a = 0; a < data.length; a++) {
                    var adult = data[a].price_for_adult;
                    var kids = data[a].price_for_child;
                    _kids.innerHTML = '( ' + newVal + ' )' + ' x ' +  currency(kids,{pattern:`# !`}).format();
                    var total = (kids * newVal) + (adult * _adult_quantity);
                    _newTotal.innerHTML = currency(total,{pattern:`# !`}).format() ;
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
                var _adult_quantity = document.getElementById('quantity-num-adult').value;
                for (var a = 0; a < data.length; a++) {
                    var adult = data[a].price_for_adult;
                    var kids = data[a].price_for_child;
                    _kids.innerHTML = '( ' + newVal + ' )' + ' x ' +  currency(kids,{pattern:`# !`}).format();
                    var total = (adult * _adult_quantity) + (kids * newVal);
                    _newTotal.innerHTML =  currency(total,{pattern:`# !`}).format();
                }
            }
        }
    });
    // btnUpChild.click(function() {
    //     var oldValue = parseFloat(input.val());
    //     if (oldValue >= max) {
    //         var newVal = oldValue;
    //     } else {
    //         var newVal = oldValue + 1;
    //     }
    //     spinner.find('input[type="number"]').val(newVal);
    //     spinner.find('input[type="number"]').trigger("change");
    // });
    // btnDownChild.click(function() {
    //     var oldValue = parseFloat(input.val());
    //     if (oldValue <= min) {
    //         var newVal = oldValue;
    //     } else {
    //         var newVal = oldValue - 1;
    //     }
    //     /* -------------------------------------------------- Heirarchy Loop */
    //     spinner.find('input[type="number"]').val(newVal);
    //     spinner.find('input[type="number"]').trigger("change");
    // });

});
}
