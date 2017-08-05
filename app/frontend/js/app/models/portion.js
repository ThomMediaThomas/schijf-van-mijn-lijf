/**
 * Created by Thomas on 26-6-2017.
 */
function Portion(data){
    var self = this;

    self.id = data.id ? data.id : null;
    self.name = ko.observable(data.name ? data.name : null);
    self.unit = ko.observable(data.unit ? data.unit : null);
    self.size = ko.observable(data.size ? data.size : null);
}
