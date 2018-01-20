/**
 * Created by Thomas on 26-6-2017.
 */
function FromMealForm() {
    var self = this;

    self.$element = $('#form-from-meal');

    self.dayparts = ko.observableArray([]);
    self.daypart_id = ko.observable();
    self.meals = ko.observableArray([]);
    self.meal_id = ko.observable();
    self.meal = ko.observable();
    self.amount = ko.observable('');

    self.isEdit = false;
    self.entry = null;

    self.init = function (entry) {
        self.$element = $('#form-from-meal');

        self.initDaypartsSelect();
        self.initMealsAutocomplete();

        self.reset();

        if (entry) {
            self.isEdit = true
            self.entry = entry;
            self.fillInEntryData(entry);
        }

        self.$element.find('#meal_id').focus();
    };

    self.reset = function () {
        self.daypart_id(APP.loadedConfig.getCurrentDaypart().id);
        self.meals([]);
        self.meal_id('');
        self.amount('');
    };

    self.fillInEntryData = function (entry) {
        var meal = entry.meal();
        self.meal_id(product.id);
        self.$element.find('#meal_id').val(meal.name);
        self.amount(entry.amount);
        self.daypart_id(entry.daypart_id);

    };

    self.initDaypartsSelect = function () {
        self.dayparts(APP.loadedConfig.dayparts);
    };

    self.initMealsAutocomplete = function () {
        var that = self;

        self.$element.find('#meal_id').autocomplete({
            source: function (request, response) {
                AJAXHELPER.GET(CONFIG.API + CONFIG.ENDPOINTS.MEAL_SEARCH, {name: request.term}, function (data) {
                    response($.map(data, function (obj) {
                        return {
                            label: obj.name,
                            value: obj.name,
                            meal: obj
                        };
                    }));
                });
            },
            select: function (evt, ui) {
                that.meal_id(ui.item.meal.id);
                that.meal(new Meal(ui.item.meal));
            }
        });
    };

    self.submit = function () {
        if (!isValid(this.$element)) {
            return false;
        }

        AJAXHELPER.POST(CONFIG.API + CONFIG.ENDPOINTS.ENTRIES, {
            entry: {
                type: 'meal',
                entry_date: APP.pages.entries.date().format(CONFIG.DATE_FORMATS.API),
                daypart_id: self.daypart_id(),
                meal_id: self.meal().id,
                amount: self.amount()
            },
        }, function (data) {
            APP.addEntry.close();
            self.isEdit = false;

            if (APP.currentPage() == 'entries') {
                APP.pages.entries.reload();
            }
            APP.notificator.show(self.meal().name + ' is succesvol toegevoegd.', 'success');
        });
    }
}
