/**
 * Created by Thomas on 26-6-2017.
 */
function ProgressPage() {
    var self = this;

    self.$form = $('#add-progress-form');

    self.period = ko.observable(0);
    self.period.subscribe(function (value) {
        var today = new moment();
        switch(value) {
            case '0':
                today = null;
                break;
            case '1':
                break;
            case '7':
                today.subtract(7, 'days');
                break;
            case '30':
                today.subtract(30, 'days');
                break;
            case '365':
                today.subtract(365, 'days');
                break;
        }
        self.start_date(today ? today.format(CONFIG.DATE_FORMATS.API) : '');
        self.loadProgresses();
    });
    self.start_date = ko.observable();

    self.progresses = ko.observableArray([]);
    self.max = ko.observable({ weight: 0, css: ''});
    self.min = ko.observable({ weight: 0, css: ''});
    self.firstDate = ko.observable();
    self.lastDate = ko.observable();
    self.progresses = ko.observableArray([]);
    self.progressesByDate = ko.observableArray([]);
    self.weight = ko.observable();
    self.date = ko.observable(moment().format(CONFIG.DATE_FORMATS.HUMAN_SHORT));

    self.init = function () {
        APP.isLoading(true);
        self.loadProgresses();
        self.$form = $('#add-progress-form');
    };

    self.reload = function () {
        self.loadProgresses();
    };

    self.loadProgresses = function () {
        self.progresses([]);

        AJAXHELPER.GET(CONFIG.API + CONFIG.ENDPOINTS.PROGRESS, {start_date: self.start_date()}, function (progresses) {//get min and max
            if (!progresses || progresses.length <= 0) {
                APP.isLoading(false);
                return false;
            }

            var max = 0, min = 200;
            _.each(progresses, function (date) {
                max = date.progress.weight > max ? date.progress.weight : max;
                min = date.progress.weight < min ? date.progress.weight : min;
            });

            var maxAdjust = max + 1,
                minAdjust = min - 3;

            //get manipulated progresses
            self.progressesByDate(_.map(progresses, function (date, index) {
                var percentage = (date.progress.weight - minAdjust) / (maxAdjust - minAdjust);
                date.progress.percentage = percentage * 100;
                date.progress.width = (Math.floor((100 / progresses.length) * 100) / 100) * 0.9;

                date.progress.css = 'height: ' + date.progress.percentage + '%;';
                date.progress.css += 'width: ' + date.progress.width + '%;';
                date.progress.css += 'left: ' + (index * date.progress.width) + '%;';

                if (date.user_input == false) {
                    date.progress.css += 'opacity: 0.5;'
                }

                if (date.progress.weight == max) {
                    self.max({
                        weight: max,
                        css: 'bottom: ' + date.progress.percentage + '%'
                    });
                }

                if (date.progress.weight == min) {
                    self.min({
                        weight: min,
                        css: 'bottom: ' + date.progress.percentage + '%'
                    });
                }

                return date;
            }));

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
                progress_date: moment(self.date(), CONFIG.DATE_FORMATS.HUMAN_SHORT).format(CONFIG.DATE_FORMATS.API)
            },
        }, function (data) {
            self.reload();
            APP.notificator.show('De voortgang is succesvol opgeslagen.', 'success');
        });
    }

}
