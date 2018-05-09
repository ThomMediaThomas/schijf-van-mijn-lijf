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

    self.created_at = moment(data.created_at).format(CONFIG.DATE_FORMATS.HUMAN_SHORT);
    self.creator = data.user && data.user.username ? data.user.username : null;
}
