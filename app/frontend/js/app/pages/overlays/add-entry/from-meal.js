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
    self.isLoading = ko.observable(false);
    self.loadingClass = ko.computed(function () {
        return self.isLoading() ? 'is-loading' : '';
    });

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
                    type: 'meal',
                    entry_date: APP.pages.entries.date().format(CONFIG.DATE_FORMATS.API),
                    daypart_id: self.daypart_id(),
                    meal_id: self.meal().id,
                    amount: self.amount()
                }
            };

        AJAXHELPER.POST(endpoint, postData, self.afterSave, function () {
            self.isLoading(false);
        });
    };

    self.saveEdit = function () {
        var endpoint = CONFIG.API + CONFIG.ENDPOINTS.ENTRIES + '/' + self.entry.id,
            postData = {
                entry: {
                    daypart_id: self.daypart_id(),
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
            APP.notificator.show(self.meal().name + ' is succesvol toegevoegd.', 'success');
        }

        self.isLoading(false);
        self.isEdit = false;
    };
}
