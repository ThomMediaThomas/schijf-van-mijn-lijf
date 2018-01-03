/**
 * Created by Thomas on 26-6-2017.
 */
function Daypart(data){
    var self = this;

    self.id = data.id;
    self.name = data.name;
    self.from = data.from;
    self.until = data.until;
    self.friendly_singular = data.friendly_singular;

    self.entries = ko.observableArray([]);

    self.entryTemplate = function (entry) {
        return entry.type;
    };


    self.calories = ko.computed(function () {
        var total = 0;

        _.each(self.entries(), function (entry) {
            total = total += entry.calories();
        });

        return total;
    });
}
