var main = (function () {
    doConstruct = function () {
        this.init_callbacks = [];
    };
    doConstruct.prototype = {
        add_init_callback : function (func) {
            if (typeof(func) == 'function') {
                this.init_callbacks.push(func);
                return true;
            }
            else {
                return false;
            }
        }
    };
    return new doConstruct;
})();
$(document).ready(function () {
    $.each(main.init_callbacks, function (index, func) {
        func();
    });
});
var users_registr = (function () {
    var doConstruct = function () {
        main.add_init_callback(this.sorting_customers);
    };
    doConstruct.prototype = {
        sorting_customers: function () { //sorting customers
            $(".sort-pos").click(function(event){
                event.preventDefault();
                var new_field = $(this).attr('data-field');
                var old_field = localStorage.getItem('old_field');
                if(new_field !== old_field){ //if click into new field
                    localStorage.removeItem('sort');
                }
                var l = localStorage.getItem('sort');
                if(l !== null){
                    if (localStorage.getItem('sort') == 'asc') {
                        localStorage.setItem('sort', 'desc');
                        var link = $(this).attr('href');
                        window.location.href = link + localStorage.getItem('sort');
                    } else {
                        localStorage.setItem('sort', 'asc');
                        var link = $(this).attr('href');
                        window.location.href = link + localStorage.getItem('sort');
                    }
                } else {
                    localStorage.setItem('sort', 'desc');
                    localStorage.setItem('old_field',new_field);
                    var link = $(this).attr('href');
                    window.location.href = link+localStorage.getItem('sort');
                }
            });
        }
    };
    return new doConstruct;
})();