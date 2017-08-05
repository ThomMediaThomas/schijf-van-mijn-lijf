/**
 * Created by Thomas on 26-6-2017.
 */
function AddEntryPage() {
    var self = this;

    self.$element = $('#add-entry');
    self.state = ko.observable('closed')

    self.fromProduct = new FromProductForm();
    self.fromMeal = new FromMealForm();
    self.fromQuick = new FromQuickForm();

    self.currentTab = ko.observable();

    self.initialized = false;

    self.toggle = function (options) {
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

    self.close = function (options) {
        self.state('closed');
    };

    self.init = function () {
        if (self.initialized) {
            return false;
        }
    };

    self.openFromProduct = function () {
        self.currentTab('product');
        _.delay(self.fromProduct.init, 500);
    };

    self.openFromMeal = function () {
        self.currentTab('meal');
        _.delay(self.fromMeal.init, 500);
    };

    self.openFromQuick = function () {
        self.currentTab('quick');
        _.delay(self.fromQuick.init, 500);
    };
}
