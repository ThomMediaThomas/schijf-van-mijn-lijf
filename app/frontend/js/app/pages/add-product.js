/**
 * Created by Thomas on 26-6-2017.
 */
function AddProductPage() {
    var self = this;

    self.$element = $('#add-product-page');
    self.$form = $('#add-product-form');

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
    self.isLoading = ko.observable(false);
    self.loadingClass = ko.computed(function () {
        return self.isLoading() ? 'is-loading' : '';
    });

    self.dateToGoTo = null;

    self.beforeOpen = function () {
        if(APP.currentPage() == 'entries') {
            self.dateToGoTo = APP.pages.entries.date();
        }
    };

    self.init = function () {
        if (self.initialized) {
            return false;
        }

        self.reset();

        self.$element = $('#add-product-page');
        self.$form = $('#add-product-form');

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
        }).autocomplete('instance')._renderItem = function (ul, item) {
            var imageUrl = item.brand.image ? item.brand.image : '/files/images/brands/default.jpg';
            return $('<li class="autocomplete-brand-suggestion">')
                .append('<div class="entry-image small">')
                .find('div.entry-image')
                .append('<img title="' + item.label + '" alt="' + item.label + '" src="' + imageUrl + '" />')
                .parent()
                .append('<div class="entry-content">')
                .find('div.entry-content')
                .append('<h4>' + item.label + '</h4>')
                .parent()
                .appendTo(ul);
        };
    };

    self.addPortion = function () {
        var portion = new Portion({});
        self.portions.push(portion);
    };

    self.submit = function () {
        if (!isValid(self.$form)) {
            return false;
        }

        self.isLoading(true);

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
                APP.navigate('entries', self.dateToGoTo ? { dateToGoTo : self.dateToGoTo } : null);
                APP.notificator.show(self.name() + ' is succesvol toegevoegd en klaar voor gebruik.', 'success');
                self.isLoading(false);
            });
        });
    };

    self.submitImage = function (callback) {
        IMAGE_UPLOADER.UPLOAD(document.getElementById('image-upload').files, function (response) {
            var imageUrl = response.url;
            callback(imageUrl);
        });
    };

    self.reset = function () {
        self.name('');
        self.brand('');
        //self.subcategory_id('');
        //self.subcategories([]);
        self.calories('');
        self.carbs('');
        self.proteins('');
        self.fat('');
        self.portions([]);
    }
}
