/**
 * Created by Thomas on 26-6-2017.
 */
function CalculatorPage(){
    var self = this;

    self.user = ko.observable();
    self.currentStep = ko.observable(1);

    self.formulaMale = '88,362 + (13,397 x KG) + (4,799 x CM) – (5,677 x JR) = kcal';
    self.formulaFeale = '477,593 + (9,247 x KG) + (3,098 x CM) – (4,33 x JR) = kcal';

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
        }, function () {
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
        }, function () {
            self.currentStep(self.currentStep() + 1);
        });
    };

    self.submitNeeds = function () {
        AJAXHELPER.POST(CONFIG.API + CONFIG.ENDPOINTS.USER + '/' + self.user().id, {
            user: {
                calories_average: self.needActivity(),
            }
        }, function () {
            self.currentStep(self.currentStep() + 1);
        });
    };

}
