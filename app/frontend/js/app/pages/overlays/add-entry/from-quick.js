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

    self.isEdit = false
    self.entry = null;

    self.init = function (entry) {
        self.$element = $('#form-from-quick');

        self.initDaypartsSelect();
        self.reset();

        if (entry) {
            self.isEdit = true
            self.entry = entry;
            self.fillInEntryData(entry);
        }

        self.$element.find('#name').focus();
    };

    self.reset = function () {
        self.daypart_id(APP.loadedConfig.getCurrentDaypart().id);
        self.name('');
        self.calories('');
    };

    self.fillInEntryData = function (entry) {
        self.name(entry.name);
        self.calories(entry.calories());
        self.daypart_id(entry.daypart_id);
    };

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
            self.isEdit = false;

            if (APP.currentPage() == 'entries') {
                APP.pages.entries.reload();
            }

            APP.notificator.show(self.name() + ' is succesvol toegevoegd.', 'success');
        });
    }
}
