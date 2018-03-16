var main = {
    //Execute functions required initially.
    execute: function () {
        //input.placeholder();
        main.javascript();
    },
    //Display an error.
    error: function (error) {
        document.querySelector('.search .error').innerHTML = error;
    },
    //Animate an element. Remember that an animation must be a pre-defined CSS class.
    animate: function (element, animation) {
        var list = document.querySelectorAll(element);
        for (i = 0; i < list.length; i++) {
            list[i].className += ' ' + animation;
        }
    },
    //Stop animating an element. Remember that an animation must be a pre-defined CSS class.
    stop_animate: function (element, animation) {
        var list = document.querySelectorAll(element);
        for (i = 0; i < list.length; i++) {
            list[i].classList.remove(animation);
        }
    },
    javascript: function () {
        console.log('JavaScript has been enabled within your browser.')
        document.querySelector('.javascript').style.display = 'none';
    }
}

var input = {
    //Update search search input.
    update: function (info) {
        var list = document.querySelectorAll('.search-input');
        for (i = 0; i < list.length; i++) {
            list[i].value = info;
        }
    },
    option: function (option) {
        input.highlight(option);
        input.large_input_option(option);
        input.small_input_option(option);
    },
    highlight: function (option) {
        var list = document.querySelectorAll('.option-item');
        for (i = 0; i < list.length; i++) {
            if (list[i].classList.contains('active')) {
                list[i].classList.remove('active');
            };
            if (list[i].classList.contains(option)) {
                list[i].classList.add('active');
            };
        }
    },
    small_input_option: function (option) {
        var skeleton;
        if (option === 'name') {
            var skeleton = `
                <input class="search-input small-search-input border-box" type="text" name="search" placeholder="Search by Name" onkeyup="input.small();" />
            `
        } else if (option === 'location') {
            var skeleton = `
            <input class="search-input small-search-input border-box" type="text" name="search" placeholder="Search by latitude and longitude" onkeyup="input.small();" />
            <i class="geo-icon icon material-icons" onclick="input.apilocation();">my_location</i>
            `
        } else if (option === 'suburb') {
            var skeleton = `
                <input class="search-input small-search-input border-box" type="text" name="search" placeholder="Search by Suburb" autocomplete="on" list="suburbs" onkeyup="input.small();" />
            `
        } else if (option === 'rating') {
            var skeleton = `
                <input class="search-input small-search-input border-box" type="number" min="0" max="5" name="search" placeholder="Search by Rating e.g. 3" onkeyup="input.small();" onmouseup="input.small();" />
            `
        };
        var list = document.querySelectorAll('.small-input-wrapper');
        for (i = 0; i < list.length; i++) {
            list[i].innerHTML = skeleton;
        };

    },
    large_input_option: function (option) {
        var skeleton;
        if (option === 'name') {
            var skeleton = `
                <input class="search-input large-search-input border-box" type="text" name="search" placeholder="Search by Name" onkeyup="input.large();" />
            `
        } else if (option === 'location') {
            var skeleton = `
            <input class="search-input large-search-input border-box" type="text" name="search" placeholder="Search by latitude and longitude (e.g. -27.4132, 152.98)" onkeyup="input.large();" />
            <i class="geo-icon icon material-icons" onclick="input.apilocation();">my_location</i>
            `
        } else if (option === 'suburb') {
            var skeleton = `
                <input class="search-input large-search-input border-box" type="text" name="search" placeholder="Search by Suburb" autocomplete="on" list="suburbs" onkeyup="input.large();" />
            `
        } else if (option === 'rating') {
            var skeleton = `
                <input class="search-input large-search-input border-box" type="number" min="0" max="5" name="search" placeholder="Search by Rating e.g. 3" onkeyup="input.large();" onmouseup="input.large();" />
            `
        };
        var list = document.querySelectorAll('.large-input-wrapper');
        for (i = 0; i < list.length; i++) {
            list[i].innerHTML = skeleton;
        };

    },
    //Update large search search input with the value of the small search search input.
    small: function () {
        small_value = document.querySelector('.small-search-input').value;
        document.querySelector('.large-search-input').value = small_value;
    },
    //Update the smallall search search input with the value of the large search search input.
    large: function () {
        large_value = document.querySelector('.large-search-input').value;
        document.querySelector('.small-search-input').value = large_value;
    },
    //Get the current position of the user and demonstrate activity for good usability.
    apilocation: function () {
        if (navigator.geolocation) {
            main.animate('.geo-icon', 'spin');
            navigator.geolocation.getCurrentPosition(input.demolocation, input.errorlocation);
        } else {
            main.error('Your browser doesn\'t support geolocation.');
        }
    },
    //Handle Geolocation API errors
    errorlocation: function (error) {
        main.error(error.code + ': ' + error.message);
        main.stop_animate('.geo-icon', 'spin');
    },
    //Input the current position passed by the input.geo(); function to the search search inputs.
    demolocation: function (position) {
        console.log(position);
        input.update(position.coords.latitude + ' ' + position.coords.longitude);
        main.stop_animate('.geo-icon', 'spin');
    },
    select_rating: function (value) {
        var elements = document.querySelectorAll('.script_anchor .material-icons');
        for (var i = 0; i < elements.length; i++) {
            elements[i].innerHTML = 'star_border';
        }
        for (var star = 0; star <= value; star++) {
            elements[star].innerHTML = 'star';
        }
        document.querySelector('.hiddensubmit_rating').value = value + 1;
    },
}

main.execute();