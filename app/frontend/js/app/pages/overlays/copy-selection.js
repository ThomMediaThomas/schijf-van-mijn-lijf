/**
 * Created by Thomas on 26-6-2017.
 */
function CopySelectionPage() {
    var self = this;

    self.$element = $('#copy-selection');
    self.$form = $('#copy-selection-form');
    self.state = ko.observable('closed');

    self.initialized = false;

    self.isLoading = ko.observable(false);
    self.loadingClass = ko.computed(function () {
        return self.isLoading() ? 'is-loading' : '';
    });

    self.entries = ko.observableArray([]);
    self.destinations = ko.observableArray([]);
    self.destination = ko.observable();

    self.toggle = function (options) {
        if (self.state() == 'open') {
            self.close(options ? options : null);
        } else {
            self.open(options ? options : null);
        }
    };

    self.open = function (options) {
        self.state('open');
        self.init();
    };

    self.close = function () {
        self.state('closed');
    };

    self.init = function () {
        if (self.initialized) {
            return false;
        }

        self.reset();
        self.entries(APP.pages.entries.selectedEntries());
        self.fillDestinationSelector();
    };

    self.reset = function () {
        self.entries([]);
        self.isLoading(false);
        self.destination(null);
        self.destinations([]);
    };

    self.entryTemplate = function (entry) {
        return entry.type + '_inline';
    };


    self.fillDestinationSelector = function () {
        var today = new moment(),
            tomorrow = (new moment()).add(1, 'days'),
            afterTomorrow = (new moment()).add(2, 'days'),
            yesterday = (new moment()).subtract(1, 'days'),
            beforeYesterday = (new moment()).subtract(2, 'days'),
            destinations = [
            {
                label: 'Vandaag - ' + today.format(CONFIG.DATE_FORMATS.HUMAN_SHORT),
                value: today.format(CONFIG.DATE_FORMATS.API)
            },
            {
                label: 'Morgen - ' + tomorrow.format(CONFIG.DATE_FORMATS.HUMAN_SHORT),
                value: tomorrow.format(CONFIG.DATE_FORMATS.API)
            },
            {
                label: 'Overmorgen - ' + afterTomorrow.format(CONFIG.DATE_FORMATS.HUMAN_SHORT),
                value: afterTomorrow.format(CONFIG.DATE_FORMATS.API)
            },
            {
                label: 'Gisteren - ' + yesterday.format(CONFIG.DATE_FORMATS.HUMAN_SHORT),
                value: yesterday.format(CONFIG.DATE_FORMATS.API)
            },
            {
                label: 'Eergisteren - ' + beforeYesterday.format(CONFIG.DATE_FORMATS.HUMAN_SHORT),
                value: beforeYesterday.format(CONFIG.DATE_FORMATS.API)
            }
        ];

        self.destinations(destinations);
        self.destination(destinations[0]);
    };

    self.submit = function () {
        if (!isValid(self.$form)) {
            return false;
        }

        self.isLoading(true);

        var that = self;

        if (APP.currentPage() == 'entries') {
            AJAXHELPER.POST(CONFIG.API + CONFIG.ENDPOINTS.COPY_ENTRIES, {
                entries: {
                    destination: self.destination(),
                    entries: _.pluck(self.entries(), 'id')
                },
            }, function (data) {
                that.close();

                if (APP.currentPage() == 'entries') {
                    APP.pages.entries.reload();
                    APP.notificator.show('Je selectie is succesvol gekopiëerd.', 'success');
                }
                self.isLoading(false);
            }, function () {
                self.isLoading(false);
            });
        }
    };

}
