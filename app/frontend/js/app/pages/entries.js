/**
 * Created by Thomas on 26-6-2017.
 */
function EntriesPage(){
    var self = this;

    self.dayparts = ko.observableArray([]);
    self.entries = ko.observableArray([]);
    self.date = ko.observable(moment());
    self.user = ko.observable();
    self.friendlyDate = ko.computed(function () {
        return self.date().format(CONFIG.DATE_FORMATS.HUMAN);
    });
    self.caloriesForToday = ko.computed(function () {
        var total = 0;
        _.each(self.dayparts(), function (daypart) {
            total += daypart.calories();
        });

        if (typeof APP != 'undefined') {
            APP.navigation.setIntroCalories(total);
        }

        return total;
    });
    self.caloriesForTodayPercentage = ko.computed(function () {
        if (self.user()) {
            var caloriesForToday = self.caloriesForToday();
            return (caloriesForToday / self.user().calories_goal()) * 100;
        }
    });
    self.caloriesGoal = ko.computed(function () {
        if (self.user()) {
            return self.user().calories_goal();
        }
    });

    self.carbsForTodayPercentage = ko.computed(function () {
        var total = 0,
            carbsCalories = self.caloriesGoal() * (CONFIG.MACRONUTRIENTS.carbs/100);

        _.each(self.entries(), function (entry) {
            total += entry.calories();
        });

        return Math.round((total/carbsCalories) * 100);
    });

    self.proteinsForTodayPercentage = ko.computed(function () {
        var total = 0,
            proteinsCalories = self.caloriesGoal() * (CONFIG.MACRONUTRIENTS.proteins/100);

        _.each(self.entries(), function (entry) {
            total += entry.proteins();
        });

        return Math.round((total/proteinsCalories) * 100);
    });

    self.fatsForTodayPercentage = ko.computed(function () {
        var total = 0,
            fatsCalories = self.caloriesGoal() * (CONFIG.MACRONUTRIENTS.fats/100);

        _.each(self.entries(), function (entry) {
            total += entry.fats();
        });

        return Math.round((total/fatsCalories) * 100);
    });

    self.init = function () {
        APP.isLoading(true);
        self.setDate(moment());
        self.user(APP.user());
    };

    self.previousDate = function () {
        var newDate = self.date().clone();
        newDate.subtract(1, 'd');
        self.setDate(newDate);
    };

    self.nextDate = function () {
        var newDate = self.date().clone();
        newDate.add(1, 'd');
        self.setDate(newDate);
    };

    self.setDate = function (date) {
        self.date(date);
        self.loadEntries();
    };

    self.toToday = function () {
        self.setDate(moment());
    };

    self.reload = function () {
        self.loadEntries();
    };

    self.loadEntries = function () {
        self.dayparts(_.clone(APP.loadedConfig.dayparts));
        self.entries([]);

        AJAXHELPER.GET(CONFIG.API + CONFIG.ENDPOINTS.ENTRIES, {
            entry_date: self.date().format(CONFIG.DATE_FORMATS.API)
        }, function (entries) {
            _.each(self.dayparts(), function (daypart) {
                daypart.entries([]);
                daypart.entries(_.map(_.filter(entries, function (entry) {
                    return daypart.id === entry.daypart_id;
                }), function (entryData) {
                    var entry = new Entry(entryData);
                    self.entries.push(entry)
                    return entry;
                }));
            });
            APP.isLoading(false);
        });
    };

    self.openAddEntry = function (daypart) {
        APP.addEntry.toggle({
            daypart: daypart
        });
    };

    self.selectedEntries = ko.computed(function () {
        return _.filter(self.entries(), function (entry) {
            return entry.selected();
        });
    });

    self.saveSelection = function () {
        APP.addMeal.toggle();
    };

    self.removeSelection = function () {
        _.each(self.selectedEntries(), function (entry) {
            entry.remove();
        });
    };
}
