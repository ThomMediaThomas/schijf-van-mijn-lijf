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
        if (self.user()) {
            var total = 0,
                carbsCalories = self.caloriesGoal() * (self.user().macronutrients().carbs / 100);

            _.each(self.entries(), function (entry) {
                total += entry.carbs();
            });

            return Math.round((total / (carbsCalories/CONFIG.KCAL_PER_GRAM.carbs)) * 100);
        }
    });

    self.carbsForTodayText = ko.computed(function () {
        if (self.user()) {
            var total = 0,
                carbsCalories = self.caloriesGoal() * (self.user().macronutrients().carbs / 100);

            _.each(self.entries(), function (entry) {
                total += entry.carbs();
            });

            return Math.round(total) + 'gr van de aanbevolen ' + Math.round(carbsCalories/CONFIG.KCAL_PER_GRAM.carbs) + 'gr.';
        }
    });

    self.proteinsForTodayPercentage = ko.computed(function () {
        if (self.user()) {
            var total = 0,
                proteinsCalories = self.caloriesGoal() * (self.user().macronutrients().proteins / 100);

            _.each(self.entries(), function (entry) {
                total += entry.proteins();
            });

            return Math.round((total / (proteinsCalories/CONFIG.KCAL_PER_GRAM.proteins)) * 100);
        }
    });

    self.proteinsForTodayText = ko.computed(function () {
        if (self.user()) {
            var total = 0,
                proteinsCalories = self.caloriesGoal() * (self.user().macronutrients().proteins / 100);

            _.each(self.entries(), function (entry) {
                total += entry.proteins();
            });

            return Math.round(total) + 'gr van de aanbevolen ' + Math.round(proteinsCalories/CONFIG.KCAL_PER_GRAM.proteins) + 'gr.';
        }
    });

    self.fatsForTodayPercentage = ko.computed(function () {
        if (self.user()) {
            var total = 0,
                fatsCalories = self.caloriesGoal() * (self.user().macronutrients().fats / 100);

            _.each(self.entries(), function (entry) {
                total += entry.fats();
            });

            return Math.round((total / (fatsCalories/CONFIG.KCAL_PER_GRAM.fats)) * 100);
        }
    });

    self.fatsForTodayText = ko.computed(function () {
        if (self.user()) {
            var total = 0,
                fatsCalories = self.caloriesGoal() * (self.user().macronutrients().fats / 100);

            _.each(self.entries(), function (entry) {
                total += entry.fats();
            });

            return Math.round(total) + 'gr van de aanbevolen ' + Math.round(fatsCalories/CONFIG.KCAL_PER_GRAM.fats) + 'gr.';
        }
    });

    self.init = function () {
        APP.isLoading(true);
        self.initSwipe();
        self.setDate(moment());
        self.user(APP.user());
    };

    self.initSwipe = function () {
        //Enable swiping...
        $("#todays-entries").swipe( {
            allowPageScroll: 'vertical',
            swipe:function(event, direction) {
                if (direction == 'left') {
                    self.nextDate();
                }
                if (direction == 'right') {
                    self.previousDate();
                }
            }
        });
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
                    return daypart.id == entry.daypart_id;
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

    self.copySelection = function () {

    };
}
