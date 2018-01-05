/**
 * Created by Thomas on 26-6-2017.
 */
function EntryPage() {
    var self = this;

    self.$element = $('#entry');
    self.state = ko.observable('closed');
    self.entry = ko.observable();

    self.initialized = false;

    self.toggle = function (entry) {
        if (self.state() == 'open') {
            self.close(entry ? entry : null);
        } else {
            self.open(entry ? entry : null);
        }
    };

    self.open = function (entry) {
        self.entry(entry);
        self.state('open');
    };

    self.close = function (entry) {
        self.state('closed');
    };

    self.init = function () {
        if (self.initialized) {
            return false;
        }
    };
}
