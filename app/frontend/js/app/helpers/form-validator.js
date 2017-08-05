function isValid ($form) {
    var errors = 0;

    //validate inputs
    _.each($form.find('input, select'), function (input) {
        var $input = $(input);
        $input.removeClass('invalid');

        if ($input.hasClass('required')) {
            if (!validateRequired($input)) {
                $input.addClass('invalid');
                errors++;
            }
        }

        if ($input.hasClass('number')) {
            if (!validateNumber($input)) {
                $input.addClass('invalid');
                errors++;
            }
        }
    });

    if (errors > 0 ) {
        APP.notificator.show('Gelieve de rood gemarkeerde velden nog even te controleren.', 'error');
    }

    return errors == 0;
}

function validateRequired ($input) {
    return !_.isNull($input.val()) && $input.val().length > 0;
}

function validateNumber ($input) {
    return _.isNumber(parseInt($input.val()));
}

