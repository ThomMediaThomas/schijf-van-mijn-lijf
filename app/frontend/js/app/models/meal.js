/**
 * Created by Thomas on 26-6-2017.
 */
function Meal(data){
    var self = this;

    self.id = data.id;
    self.name = data.name;
    self.products = ko.observableArray(_.map(data.products, function (product) {
        return new Entry(product);
    }));
}
