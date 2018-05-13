/**
 * Created by Thomas on 26-6-2017.
 */
function AddMealPage(){
    var self = this;

    self.$element = $('#add-meal');
    self.$form = $('#add-meal-form');
    self.state = ko.observable('closed');

    self.name = ko.observable();
    self.entries = ko.observableArray([]);

    self.initialized = false;

    self.isLoading = ko.observable(false);
    self.loadingClass = ko.computed(function () {
        return self.isLoading() ? 'is-loading' : '';
    });

    self.toggle = function () {
        if (self.state() == 'open') {
            self.close();
        } else {
            self.open();
        }
    };

    self.open = function () {
        self.state('open');
        self.init();
    };

    self.close = function () {
        self.state('closed');
    };

    self.init = function () {
        if (self.initialized) {
            return false;
        }

        self.entries(APP.pages.entries.selectedEntries());
        self.$element.find('#name').focus();
    };

    self.submit = function () {
        if (!isValid(self.$form)) {
            return false;
        }

        self.isLoading(true);

        var that = self;

        if (APP.currentPage() == 'entries') {
            AJAXHELPER.POST(CONFIG.API + CONFIG.ENDPOINTS.MEALS, {
                meal: {
                    name: self.name(),
                    products: _.map(self.entries(), function (entry) {
                        return {
                            product_id: entry.product().id,
                            portion_id: entry.portion().id,
                            amount: entry.amount
                        }
                    })
                },
            }, function (data) {
                that.close();

                if (APP.currentPage() == 'entries') {
                    APP.pages.entries.reload();
                }

                APP.notificator.show('Je maaltijd is succesvol opgeslagen.', 'success');
            }, function () {
                self.isLoading(false);
            });
        }
    }
}
