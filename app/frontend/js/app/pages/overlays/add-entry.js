/**
 * Created by Thomas on 26-6-2017.
 */
function AddEntryPage() {
    var self = this;

    self.$element = $('#add-entry');
    self.state = ko.observable('closed');
    self.isEdit = ko.observable(false);

    self.fromProduct = new FromProductForm();
    self.fromMeal = new FromMealForm();
    self.fromQuick = new FromQuickForm();

    self.currentTab = ko.observable();

    self.initialized = false

    self.buttonName = ko.computed(function () {
       return self.isEdit() ? 'Wijzigingen opslaan' : 'Toevoegen';
    });

    self.toggle = function (options) {
        self.isEdit(false);
        if (self.state() == 'open') {
            self.close(options ? options : null);
        } else {
            self.open(options ? options : null);
        }
    };

    self.open = function (options) {
        if (options && options.daypart) {
            APP.loadedConfig.forceCurrentDaypart(options.daypart);
        } else {
            APP.loadedConfig.forceCurrentDaypart(null);
        }

        self.state('open');
        self.openFromProduct();
    };

    self.edit = function (entry) {
        self.state('open');
        self.isEdit(true);

        if (entry.type == 'product') {
            self.openFromProduct(entry);
        }

        if (entry.type == 'meal') {
            self.openFromMeal(entry);
        }

        if (entry.type == 'quick') {
            self.openFromQuick(entry);
        }
    };

    self.close = function (options) {
        self.state('closed');
    };

    self.init = function () {
        if (self.initialized) {
            return false;
        }
    };

    self.openFromProduct = function (entry) {
        self.currentTab('product');
        _.delay($.proxy(function() {
            self.fromProduct.init(entry);
        }, self, entry), 500);
    };

    self.openFromMeal = function (entry) {
        self.currentTab('meal');
        _.delay($.proxy(function() {
            self.fromMeal.init(entry);
        }, self, entry), 500);
    };

    self.openFromQuick = function (entry) {
        self.currentTab('quick');
        _.delay($.proxy(function() {
            self.fromQuick.init(entry);
        }, self, entry), 500);
    };
}
