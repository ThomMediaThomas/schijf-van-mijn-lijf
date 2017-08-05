/**
 * Created by Thomas on 26-6-2017.
 */
function FromQuickForm(){
    var self = this;

    self.$element = $('#form-from-quick');

    self.dayparts = ko.observableArray([]);
    self.daypart_id = ko.observable();
    self.name = ko.observable('');
    self.calories = ko.observable('');

    self.init = function () {
        self.initDaypartsSelect();
        self.reset();

        self.$element.find('#name').focus();
    };

    self.reset = function () {
        self.daypart_id(APP.loadedConfig.getCurrentDaypart().id);
        self.name('');
        self.calories('');
    },

    self.initDaypartsSelect = function () {
        self.dayparts(APP.loadedConfig.dayparts);
    };

    self.submit = function () {
        if (!isValid(this.$element)) {
            return false;
        }

        AJAXHELPER.POST(CONFIG.API + CONFIG.ENDPOINTS.ENTRIES, {
            entry: {
                type: 'quick',
                entry_date: APP.pages.entries.date().format(CONFIG.DATE_FORMATS.API),
                daypart_id: self.daypart_id(),
                name: self.name(),
                calories: self.calories()
            }
        }, function (data) {
            APP.addEntry.close();

            if (APP.currentPage() == 'entries') {
                APP.pages.entries.reload();
            }

            APP.notificator.show(self.name() + ' is succesvol toegevoegd.', 'success');
        });
    }
}
