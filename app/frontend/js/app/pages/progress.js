/**
 * Created by Thomas on 26-6-2017.
 */
function ProgressPage() {
    var self = this;

    self.$form = $('#add-progress-form');

    self.period = ko.observable(0);
    self.periods = ko.observableArray([]);
    self.period.subscribe(function (value) {
        self.start_date(value);
        self.loadProgresses();
    });
    self.start_date = ko.observable();

    self.firstDate = ko.observable();
    self.lastDate = ko.observable();
    self.weight = ko.observable();
    self.date = ko.observable(moment().format(CONFIG.DATE_FORMATS.API));

    self.init = function () {
        APP.isLoading(true);
        self.fillPeriodSelector();
        self.loadProgresses();
        self.$form = $('#add-progress-form');
    };

    self.reload = function () {
        self.loadProgresses();
    };

    self.fillPeriodSelector = function () {
        var forever = (new moment()).subtract(10, 'years').format(CONFIG.DATE_FORMATS.API),
            periods = [
                {
                    label: 'Sinds eerste invoer',
                    value: forever
                },
                {
                    label: 'Afgelopen jaar',
                    value: (new moment()).subtract(365, 'days').format(CONFIG.DATE_FORMATS.API)
                },
                {
                    label: 'Afgelopen maand',
                    value: (new moment()).subtract(30, 'days').format(CONFIG.DATE_FORMATS.API)
                },
                {
                    label: 'Afgelopen week',
                    value: (new moment()).subtract(7, 'days').format(CONFIG.DATE_FORMATS.API)
                }
            ];

        if (APP.user() && APP.user().current_program() && APP.user().current_program().start_date()) {
            periods.push({
                label: 'Vanaf start huidige programma',
                value: APP.user().current_program().start_date()
            });
        }

        self.periods(periods);
        self.start_date(forever);
    };

    self.loadProgresses = function () {
        APP.isLoading(true);

        AJAXHELPER.GET(CONFIG.API + CONFIG.ENDPOINTS.PROGRESS, {start_date: self.start_date()}, function (progresses) {//get min and max
            var ctx = document.getElementById('progress-stat').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: progresses ? _.pluck(progresses, 'progress_date') : [],
                    datasets: [{
                        borderColor: 'rgba(253, 116, 0, 1)',
                        backgroundColor: 'rgba(253, 116, 0, 0.2)',
                        data: progresses ? _.pluck(progresses, 'weight') : []
                    }]
                },
                options: {
                    legend : {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontColor: '#989898',
                                fontFamily: '"Open Sans", sans-serif;'
                            },
                            gridLines: {
                                display: false
                            }
                        }]
                    }
                }
            });

            self.firstDate(moment(progresses[0].progress_date).format(CONFIG.DATE_FORMATS.HUMAN_SHORT));
            self.lastDate(moment(progresses[progresses.length - 1].progress_date).format(CONFIG.DATE_FORMATS.HUMAN_SHORT));

            APP.isLoading(false);
        });
    };

    self.getDatesBetween = function (startDate, stopDate) {
        var dateArray = [];
        var currentDate = moment(startDate);
        var stopDate = moment(stopDate);
        while (currentDate <= stopDate) {
            dateArray.push(moment(currentDate).format('YYYY-MM-DD'))
            currentDate = moment(currentDate).add(1, 'days');
        }
        return dateArray;
    };

    self.submitProgress = function () {
        if (!isValid(self.$form)) {
            return false;
        }

        AJAXHELPER.POST(CONFIG.API + CONFIG.ENDPOINTS.PROGRESS, {
            progress: {
                weight: self.weight(),
                progress_date: self.date()
            },
        }, function (data) {
            self.reload();
            APP.notificator.show('De voortgang is succesvol opgeslagen.', 'success');
        });
    }

}
