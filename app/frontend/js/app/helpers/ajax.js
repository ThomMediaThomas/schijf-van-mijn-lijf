var AJAXHELPER = {
        GET: function (url, data, callback) {
            $.ajax({
                url: url,
                data: extendWithCredentials(data),
                type: 'GET',
                success: callback,
                error: function () {
                    APP.notificator.show('Helaas ging er iets mis, probeer later nog een keer...', 'error');
                }
            });
        },
        POST: function (url, data, callback) {
            $.ajax({
                url: url,
                data: extendWithCredentials(data),
                type: 'POST',
                success: callback,
                error: function () {
                    APP.notificator.show('Helaas ging er iets mis, probeer later nog een keer...', 'error');
                }
            });
        },
        DELETE: function (url, data, callback) {
            $.ajax({
                url: url,
                data: extendWithCredentials(data),
                type: 'DELETE',
                success: callback,
                error: function () {
                    APP.notificator.show('Helaas ging er iets mis, probeer later nog een keer...', 'error');
                }
            })
        },
    };

function extendWithCredentials(data) {
    if (_.isUndefined(data.authentication)) {
        data.authentication = AUTHENTICATION.get();
    }

    return data;
};

var IMAGE_UPLOADER = {
    UPLOAD: function (files, callback) {
        var fileFormData = new FormData();

        if (files) {
            fileFormData.append('image', files[0]);
        }

        $.ajax({
            url: CONFIG.API + CONFIG.ENDPOINTS.UPLOAD,
            data: fileFormData,
            type: 'POST',
            contentType: false,
            processData: false,
            success: callback,
            error: function () {
                APP.notificator.show('Helaas ging er iets mis, probeer later nog een keer...', 'error');
            }
        });
    }
};
