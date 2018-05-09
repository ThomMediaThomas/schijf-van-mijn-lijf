/**
 * Created by Thomas on 26-6-2017.
 */
function Product(data){
    var self = this;

    self.id = data.id;
    self.name = data.name;
    self.image = IMAGEHELPER.RESOLVE(data.image);
    self.calories = data.calories;
    self.proteins = data.proteins;
    self.carbs = data.carbs;
    self.fats = data.fats;
    self.subcategory = ko.observable(new Subcategory(data.subcategory));
    self.category = ko.observable(new Category(data.subcategory.category));
    self.brand = ko.observable(new Brand(data.brand));
    self.portions = ko.observableArray(data.portions);

    self.created_at = moment(data.created_at).format(CONFIG.DATE_FORMATS.HUMAN_SHORT);
    self.creator = data.user && data.user.username ? data.user.username : null;
}
