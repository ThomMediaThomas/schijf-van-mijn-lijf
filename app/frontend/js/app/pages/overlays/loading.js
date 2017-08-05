/**
 * Created by Thomas on 26-6-2017.
 */
function LoadingPage(){
    var self = this;

    self.$element = $('#loading');
    self.state = ko.observable('closed')

    self.isLoading = function (loading) {
        if (loading) {
            self.state('open');
        } else {
            self.state('closed');
        }
    };
}
