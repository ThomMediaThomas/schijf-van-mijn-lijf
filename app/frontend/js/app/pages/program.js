/**
 * Created by Thomas on 26-6-2017.
 */
function ProgramPage(){
    var self = this;
    self.user = ko.observable();

    self.hasProgram = ko.computed(function () {
        if (self.user()) {
            return !_.isNull(self.user().current_program().id);
        } else {
            return false;
        }
    });

    self.goalFriendly = ko.computed(function () {
        return self.user() ? self.user().current_program().goal_type_friendly() : '';
    });

    self.kilocalories = ko.computed(function () {
        return self.user() ? self.user().calories_goal() : 0;
    });

    self.programSince = ko.computed(function () {
        if (self.user()) {
            var date = self.user().current_program().start_date()
            return moment(date).format(CONFIG.DATE_FORMATS.HUMAN);
        } else {
            return '';
        }
    });

    self.carbs = ko.computed(function () {
        return self.user() ? self.user().macronutrients().carbs : 0;
    });

    self.proteins = ko.computed(function () {
        return self.user() ? self.user().macronutrients().proteins : 0;
    });

    self.fats = ko.computed(function () {
        return self.user() ? self.user().macronutrients().fats : 0;
    });

    self.init = function () {
        self.user(APP.user());
    };

}
