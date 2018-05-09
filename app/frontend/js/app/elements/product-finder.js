/**
 * Created by Thomas on 26-6-2017.
 */
function ProductFinder() {
    var self = this;

    self.$element = $('#product-finder');
    self.state = ko.observable('closed');
    self.results = ko.observableArray([]);

    self.callback = false;

    self.initialized = false;

    self.toggle = function () {
        if (self.state() == 'open') {
            self.close();
        } else {
            self.open();
        }
    };

    self.open = function () {
        self.state('open');
        self.$element.find('#term').val('').focus();
        self.results([]);
        self.init();
    };

    self.close = function () {
        self.state('closed');
    };

    self.setCallback = function (callback) {
        self.callback = callback;
    };

    self.init = function () {
        if (self.initialized) {
            return false;
        }

        self.bindEvents();
        self.initialized = true;
    };

    self.currentRequest = null;
    self.bindEvents = function () {
        var $productAutocomplete = self.$element.find('#term');
        $productAutocomplete.off('keyup').on('keyup', function () {
            var term = $productAutocomplete.val();

            if (term.length >= 2) {
                if (self.currentRequest) {
                    self.currentRequest.abort();
                }

                self.currentRequest = AJAXHELPER.GET(CONFIG.API + CONFIG.ENDPOINTS.PRODUCT_SEARCH, {name: term}, function (data) {
                    var results = _.map(data, function (result) {
                        result.image = IMAGEHELPER.RESOLVE(result.image);
                        return result;
                    });
                    self.results(results);
                });
            }
        });
    };

    self.selectProduct = function (product) {
        if (self.callback) {
            self.callback(product);
        }
    };
}
