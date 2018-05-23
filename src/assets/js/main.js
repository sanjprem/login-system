$(document)
.on("submit", "form.js-register", function(event) {

    var _form = $(this);
    var _error = $(".js-error", _form);

    var dataObj = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
    };

    if(dataObj.email.length < 11) {
        _error
            .text("Please enter a valid email address.")
            .show();
        return false;
    } else if (dataObj.password.length < 6) {
        _error
            .text("Please enter a passphrase longer than 6 characters.")
            .show();
        return false;
    }

    _error.hide();

    $.ajax({
        type: 'POST',
        // url: (_form.hasClass('js-login') ? '/ajax/login.php' : '/ajax/register.php'),
        url: '/ajax/register.php',
        data: dataObj,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(data) {
        if(data.redirect !== undefined) {
            window.location = data.redirect;
        } else if(data.error !== undefined) {
            _error
                .text(data.error)
                .show();
        }
    })
    .fail(function ajaxFailed(e) {
    })
    .always(function ajaxAlwaysDoThis(data) {
        console.log('Always');
    })

    return false;
})

// login
.on("submit", "form.js-login", function(event) {

    var _form = $(this);
    var _error = $(".js-error", _form);

    var dataObj = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
    };

    if(dataObj.email.length < 11) {
        _error
            .text("Please enter a valid email address.")
            .show();
        return false;
    } else if (dataObj.password.length < 6) {
        _error
            .text("Please enter a passphrase longer than 6 characters.")
            .show();
        return false;
    }

    _error.hide();

    $.ajax({
        type: 'POST',
        url: '/ajax/login.php',
        data: dataObj,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(data) {
        if(data.redirect !== undefined) {
            window.location = data.redirect;
        } else if(data.error !== undefined) {
            _error
                .html(data.error)
                .show();
        }
    })
    .fail(function ajaxFailed(e) {
    })
    .always(function ajaxAlwaysDoThis(data) {
        console.log('Always');
    })

    return false;
})