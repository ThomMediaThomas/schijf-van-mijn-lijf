/**
 * Created by Thomas on 26-6-2017.
 */
function CalculatorPage(){
    var self = this;

    self.user = ko.observable();
    self.currentStep = ko.observable(1);

    self.formulaMale = '88,362 + (13,397 x KG) + (4,799 x CM) – (5,677 x JR) = kcal';
    self.formulaFeale = '477,593 + (9,247 x KG) + (3,098 x CM) – (4,33 x JR) = kcal';
    self.oneKg = 7700;

    self.program = ko.observable(new Program());
    self.goal_speed = ko.observable();

    self.needRest = ko.computed(function () {
        if (self.user() && self.user().id) {
            var length = parseInt(self.user().length()),
                weight = parseInt(self.user().weight()),
                age = moment().diff(moment(self.user().birthdate()), 'years');

            if (length && weight && age) {
                if (self.user().gender() == 'm') {
                    return Math.floor(88.362 + (13.397 * weight) + (4.799 * length) - (5.677 * age));
                } else {
                    return Math.floor(477.593 + (9.247 * weight) + (3.098 * length) - (4.33 * age));
                }
            }
        }

        return '...';
    });

    self.needActivity = ko.computed(function () {
        if (self.user() && self.user().id && self.user().activity_level()) {
            return self.needRest() * parseFloat(self.user().activity_level());
        }
        return '...';
    });

    self.init = function () {
        self.user(APP.user());
    };

    self.submitPersonal = function () {
        if (!isValid($('#calculator-personal-form'))) {
            return false;
        }

        AJAXHELPER.POST(CONFIG.API + CONFIG.ENDPOINTS.USER + '/' + self.user().id, {
            user: {
                gender: self.user().gender(),
                weight: self.user().weight(),
                length: self.user().length(),
                birthdate: self.user().birthdate()
            }
        }, function (user) {
            self.user(new User(user));
            self.currentStep(self.currentStep() + 1);
        });
    };

    self.submitActivity = function () {
        if (!isValid($('#calculator-activity-form'))) {
            return false;
        }

        AJAXHELPER.POST(CONFIG.API + CONFIG.ENDPOINTS.USER + '/' + self.user().id, {
            user: {
                activity_level: self.user().activity_level(),
            }
        }, function (user) {
            self.user(new User(user));
            self.currentStep(self.currentStep() + 1);
        });
    };

    self.submitNeeds = function () {
        AJAXHELPER.POST(CONFIG.API + CONFIG.ENDPOINTS.USER + '/' + self.user().id, {
            user: {
                calories_average: self.needActivity(),
            }
        }, function (user) {
            self.user(new User(user));
            self.currentStep(self.currentStep() + 1);
        });
    };

    self.createAdvice = function () {
        if (self.program().goal_type == 'loose') {
            //Set calories goal
            var caloriesGoal = parseFloat(self.user().calories_average()) * ((100 - parseFloat(self.goal_speed())) / 100);
            self.program().calories_goal(Math.floor(caloriesGoal));

            //Set goal duration
            var weightToLoose = parseFloat(self.user().weight()) - parseFloat(self.program().preferred_weight()),
                caloriesLess = Math.floor(parseFloat(self.user().calories_average() - caloriesGoal)),
                kgPerDay = parseFloat(caloriesLess / self.oneKg).toFixed(3),
                daysForTotal = Math.ceil(weightToLoose / kgPerDay);

            self.program().goal_duration(daysForTotal);
            self.program().start_date(moment());
        } else if (self.program().goal_type == 'stay') {
            self.program().calories_goal(self.user().calories_average());
            self.program().start_date(moment());
        } else if (self.program().goal_type == 'gain') {
            //Set calories goal
            var caloriesGoal = parseFloat(self.user().calories_average()) * ((100 + parseFloat(self.goal_speed())) / 100);
            self.program().calories_goal(Math.floor(caloriesGoal));

            //Set goal duration
            var weightToGain = parseFloat(self.program().preferred_weight()) - parseFloat(self.user().weight()),
                caloriesExtra = Math.floor(caloriesGoal - parseFloat(self.user().calories_average())),
                kgPerDay = parseFloat(caloriesExtra / self.oneKg).toFixed(3),
                daysForTotal = Math.ceil(weightToGain / kgPerDay);

            self.program().goal_duration(daysForTotal);
            self.program().start_date(moment());
        }

        self.currentStep(self.currentStep() + 1);
    };

    self.submitGoal = function () {
        AJAXHELPER.POST(CONFIG.API + CONFIG.ENDPOINTS.USER + '/' + self.user().id, {
            program: {
                'goal_type': self.program.goal_type(),
                'preferred_weight': self.program.preferred_weight(),
                'calories_goal': self.program.calories_goal(),
                'goal_duration': self.program.goal_duration(),
                'start_date': self.program.start_date(),
                'started': self.program.started(),
            }
        }, function () {
            self.currentStep(self.currentStep() + 1);
        });
    };

}
