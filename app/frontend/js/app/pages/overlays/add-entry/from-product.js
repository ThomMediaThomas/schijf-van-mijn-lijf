/**
 * Created by Thomas on 26-6-2017.
 */
function FromProductForm() {
    var self = this;

    self.$element = $('#form-from-product');

    self.dayparts = ko.observableArray([]);
    self.daypart_id = ko.observable();
    self.product = ko.observable();
    self.product_id = ko.observable('');
    self.portions = ko.observableArray([]);
    self.portion_id = ko.observable('');
    self.amount = ko.observable('');

    self.savePortion = ko.observable(false);
    self.portionName = ko.observable('');

    self.isEdit = false;
    self.showSavePortion = ko.observable(true);
    self.entry = null;
    self.isLoading = ko.observable(false);
    self.loadingClass = ko.computed(function () {
        return self.isLoading() ? 'is-loading' : '';
    });

    self.showPortionInfo = ko.computed(function () {
        return !self.isEdit && (self.product_id() && self.portion_id() && self.amount());
    });
    self.calories = ko.computed(function () {
        if (self.product_id() && self.portion_id() && self.amount() && self.product()) {
            var portion = _.first(_.filter(self.portions(), function (portion) {
                return portion.id == self.portion_id();
            }));

            return Math.round((self.product().calories / 100) * parseInt(portion.size) * parseInt(self.amount()));
        }
    });

    self.init = function (entry) {
        self.$element = $('#form-from-product');

        self.initDaypartsSelect();
        self.initProductAutocomplete();

        self.reset();

        if (entry) {
            self.isEdit = true;
            self.entry = entry;
            self.fillInEntryData(entry);
            self.showSavePortion(false);
        }

        //self.$element.find('#product_id').focus();
    };

    self.reset = function () {
        self.daypart_id(APP.loadedConfig.getCurrentDaypart().id);
        self.product_id('');
        self.product(null);
        self.$element.find('#product_id').val('');
        self.amount('');
        self.portion_id('');
        self.savePortion(false);
        self.portionName('');

        self.isEdit = false;
        self.entry = null;
        self.showSavePortion(true);
    };

    self.fillInEntryData = function (entry) {
        var product = entry.product();
        self.product_id(product.id);
        self.$element.find('#product_id').val(product.name);
        self.portions(_.map(product.portions(), function (portion) {
            return _.extend(portion, {
                friendlyName: portion.name + ' - ' + portion.size + portion.unit
            });
        }));
        self.portion_id(entry.portion().id);
        self.amount(entry.amount);
        self.daypart_id(entry.daypart_id);
    };

    self.initDaypartsSelect = function () {
        self.dayparts(APP.loadedConfig.dayparts);
    };

    self.initProductAutocomplete = function () {
        self.$element.find('#product_id')
            .off('focus')
            .on('focus', function () {
                APP.productFinder.setCallback(self.productSelected);
                APP.productFinder.open();
            });
    };

    self.productSelected = function (product) {
        self.portions(_.map(product.portions, function (portion) {
            return _.extend(portion, {
                friendlyName: portion.name + ' - ' + portion.size + portion.unit
            });
        }));

        if (_.first(product.portions)) {
            self.portion_id(_.first(product.portions).id);
        }

        self.product(new Product(product));
        self.product_id(product.id);
        self.$element.find('#product_id').val(product.name);

        APP.productFinder.close();
    };

    self.submit = function () {
        if (!isValid(this.$element)) {
            return false;
        }

        self.isLoading(true);

        if (!self.isEdit) {
            self.saveNew();
        } else {
            self.saveEdit();
        }
    };

    self.saveNew = function () {
        var endpoint = CONFIG.API + CONFIG.ENDPOINTS.ENTRIES,
            postData = {
                entry: {
                    type: 'product',
                    entry_date: APP.pages.entries.date().format(CONFIG.DATE_FORMATS.API),
                    daypart_id: self.daypart_id(),
                    product_id: self.product().id,
                    portion_id: self.portion_id(),
                    amount: self.amount()
                }
            };

        if (self.savePortion()) {
            postData.entry.portion_name = self.portionName();
        }

        AJAXHELPER.POST(endpoint, postData, self.afterSave, function () {
            self.isLoading(false);
        });
    };

    self.saveEdit = function () {
        var endpoint = CONFIG.API + CONFIG.ENDPOINTS.ENTRIES + '/' + self.entry.id,
            postData = {
                entry: {
                    daypart_id: self.daypart_id(),
                    portion_id: self.portion_id(),
                    amount: self.amount()
                }
            };

        AJAXHELPER.POST(endpoint, postData, self.afterSave, function () {
            self.isLoading(false);
        });
    };

    self.afterSave = function (data) {
        APP.addEntry.close();

        if (APP.currentPage() == 'entries') {
            APP.pages.entries.reload();
        }

        if (self.isEdit) {
            APP.notificator.show('Je wijzigingen zijn succesvol opgeslagen.', 'success');
        } else {
            APP.notificator.show(self.product().name + ' is succesvol toegevoegd.', 'success');
        }

        self.isLoading(false);
        self.isEdit = false;
    }
}
