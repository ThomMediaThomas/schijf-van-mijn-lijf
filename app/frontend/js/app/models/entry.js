/**
 * Created by Thomas on 26-6-2017.
 */
function Entry(data){
    var self = this;

    self.id = data.id;
    self.type = data.type;
    self.name = data.name;
    self.product = ko.observable(data.product ? new Product(data.product) : null);
    self.meal = ko.observable(data.meal ? new Meal(data.meal) : null);
    self.portion = ko.observable(data.portion ? new Portion(data.portion) : null);
    self.amount = data.amount;
    self.daypart_id = data.daypart_id;

    self.selected = ko.observable(false);
    self.selectedClass = ko.computed(function () {
        return self.selected() ? 'icon-checkbox-checked' : 'icon-checkbox-unchecked';
    });
    self.open = ko.observable(false);
    self.openClass = ko.computed(function () {
        return self.open() ? 'open' : '';
    });

    self.subcategory = ko.computed(function(){
        return self.product() ? self.product().subcategory() : null;
    });

    self.category = ko.computed(function(){
        return self.product() ? self.product().category() : null;
    });

    self.categorySystemName  = ko.computed(function (){
        return self.category() ? self.category().system_name : null;
    });

    self.classNameWithoutSelection = ko.computed(function (){
        return 'entry ' + self.categorySystemName() + ' ' + self.type;
    });

    self.className = ko.computed(function (){
        return self.classNameWithoutSelection() + ' ' + (self.selected() ? 'selected' : '');
    });

    self.icon = ko.computed(function () {
        return self.subcategory() ? 'icon-' + self.subcategory().system_name : null;
    });

    self.friendlyAmount = ko.computed(function () {
        if (self.portion()) {
            return self.amount + ' x ' + self.portion().name();
        } else if (self.meal()) {
            return self.amount + ' x ' + self.meal().name;
        } else {
            return self.amount;
        }
    });

    self.calories = ko.computed(function () {
        if (self.product() && self.portion()) {
            return Math.round((self.product().calories / 100) * self.portion().size() * self.amount);
        } else if (self.meal()) {
            var calories = 0;

            _.each(self.meal().products(), function (product) {
                calories += (product.product().calories / 100) * product.portion().size() * product.amount;
            });

            return calories * self.amount;
        } else {
            return parseInt(data.calories);
        }
    });

    self.carbs = ko.computed(function () {
        if (self.product() && self.portion()) {
            return (self.product().carbs / 100) * self.portion().size() * self.amount;
        } else if (self.meal()) {
            var carbs = 0;

            _.each(self.meal().products(), function (product) {
                carbs += (product.product().carbs / 100) * product.portion().size() * product.amount;
            });

            return carbs * self.amount;
        } else {
            return 0;
        }
    });

    self.proteins = ko.computed(function () {
        if (self.product() && self.portion()) {
            return (self.product().proteins / 100) * self.portion().size() * self.amount;
        } else if (self.meal()) {
            var proteins = 0;

            _.each(self.meal().products(), function (product) {
                proteins += (product.product().proteins / 100) * product.portion().size() * product.amount;
            });

            return proteins * self.amount;
        } else {
            return 0;
        }
    });

    self.fats = ko.computed(function () {
        if (self.product() && self.portion()) {
            return (self.product().fats / 100) * self.portion().size() * self.amount;
        } else if (self.meal()) {
            var fats = 0;

            _.each(self.meal().products(), function (product) {
                fats += (product.product().fats / 100) * product.portion().size() * product.amount;
            });

            return fats * self.amount;
        } else {
            return 0;
        }
    });

    self.categories = ko.computed(function(){
        if (self.meal()) {
            var categories = [];

            _.each(self.meal().products(), function (product) {
                categories.push({
                    categorySystemName: product.category() ? product.category().system_name : null,
                    icon: product.subcategory() ? 'icon-' + product.subcategory().system_name : null
                });
            });

            return categories;
        }
    });

    /*region: Methods*/
    self.remove = function () {
        AJAXHELPER.DELETE(CONFIG.API + CONFIG.ENDPOINTS.ENTRIES + '/' + self.id, { }, function () {
            if (APP.currentPage() == 'entries') {
                APP.pages.entries.reload();
            }
        });
    };

    self.select = function () {
        self.selected(!self.selected());
    };

    self.toggle = function () {
        self.open(!self.open());
    };

    self.openEntry = function (entry) {
        APP.entryPage.toggle(entry);
    };

    self.editEntry = function (entry) {
        APP.addEntry.edit(entry);
    };
    /*endregion: Methods*/
}
