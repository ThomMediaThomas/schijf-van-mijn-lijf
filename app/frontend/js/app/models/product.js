/**
 * Created by Thomas on 26-6-2017.
 */
function Product(data){
    var self = this;

    self.id = data.id;
    self.name = data.name;
    self.image = data.image;
    self.calories = data.calories;
    self.subcategory = ko.observable(new Subcategory(data.subcategory));
    self.category = ko.observable(new Category(data.subcategory.category));
    self.brand = ko.observable(new Brand(data.brand));
}
