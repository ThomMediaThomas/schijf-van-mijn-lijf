/**
 * Created by Thomas on 26-6-2017.
 */
function AddProductPage() {
    var self = this;

    self.$element = $('#add-product-page');

    self.name = ko.observable('');
    self.brand = ko.observable('');
    self.subcategory_id = ko.observable('');
    self.subcategories = ko.observableArray([]);

    self.calories = ko.observable('');
    self.carbs = ko.observable('');
    self.proteins = ko.observable('');
    self.fat = ko.observable('');

    self.portions = ko.observableArray([]);

    self.initialized = false;

    self.init = function () {
        if (self.initialized) {
            return false;
        }

        self.$element = $('#add-product-page');

        self.initSubcategorySelect();
        self.initBrandsAutocomplete();
    };

    self.initSubcategorySelect = function () {
        self.subcategories(APP.loadedConfig.subcategories);
    };

    self.initBrandsAutocomplete = function () {
        var that = self;

        self.$element.find('#brand').autocomplete({
            source: function (request, response) {
                AJAXHELPER.GET(CONFIG.API + CONFIG.ENDPOINTS.BRAND_SEARCH, { name: request.term }, function (data) {
                    response($.map(data, function(obj) {
                        return {
                            label: obj.name,
                            value: obj.name,
                            brand: obj
                        };
                    }));
                });
            },
            select: function (evt, ui) {
                that.brand(ui.item.brand.id);
            }
        });
    };

    self.addPortion = function () {
        var portion = new Portion({});
        self.portions.push(portion);
    };

    self.submit = function () {
        self.submitImage(function (imageUrl) {
            AJAXHELPER.POST(CONFIG.API + CONFIG.ENDPOINTS.PRODUCTS, {
                product: {
                    name: self.name(),
                    brand: self.brand(),
                    subcategory_id: self.subcategory_id(),
                    image: imageUrl,
                    calories: self.calories(),
                    proteins: self.proteins(),
                    carbs: self.carbs(),
                    fats: self.fat(),
                    portions: _.map(self.portions(), function (portion) {
                        return {
                            name: portion.name(),
                            size: portion.size(),
                            unit: portion.unit()
                        };
                    })
                },
            }, function (data) {
                APP.navigate('entries');
                APP.notificator.show(self.name() + ' is succesvol toegevoegd en klaar voor gebruik.', 'success');
            });
        });
    };

    self.submitImage = function (callback) {
        IMAGE_UPLOADER.UPLOAD(document.getElementById('image-upload').files, function (response) {
            var imageUrl = response.url;
            callback(imageUrl);
        });
    };
}
