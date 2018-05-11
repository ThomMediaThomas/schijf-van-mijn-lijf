/**
 * Created by Thomas on 26-6-2017.
 */
function CopySelectionPage() {
    var self = this;

    self.$element = $('#copy-selection');
    self.state = ko.observable('closed');

    self.initialized = false;

    self.toggle = function (options) {
        self.isEdit(false);
        if (self.state() == 'open') {
            self.close(options ? options : null);
        } else {
            self.open(options ? options : null);
        }
    };

    self.open = function (options) {
        self.state('open');
    };

}
