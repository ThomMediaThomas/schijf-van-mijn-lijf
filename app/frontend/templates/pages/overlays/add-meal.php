<div id="add-meal" class="page overlay" data-bind="with: addMeal, css: addMeal.state">
    <div class="content-wrapper">
        <form id="add-meal-form">
            <form>
                <div class="heading">
                    <h3>Maaltijd toevoegen</h3>
                </div>
                <div class="form-row">
                    <label for="username">Naam:</label>
                    <input class="required" type="text" id="name" name="name" data-bind="value: name">
                </div>
                <div class="form-row">
                    <label for="username">Producten:</label>
                    <div data-bind="foreach: entries()">
                    <div class="entry" data-bind="css: classNameWithoutSelection()">
                        <div class="entry-wrapper">
                            <div class="entry-image" data-bind="with: product()">
                                <img data-bind="attr: { src: image, alt: name, title: name }"/>
                            </div>
                            <div class="entry-content">
                                <h4 data-bind="text: product().name"></h4>
                                <h5><strong data-bind="text: friendlyAmount"></strong> - <span data-bind="text: calories"></span> calorieën
                                </h5>
                            </div>
                            <div class="entry-category">
                            <span class="category" data-bind="css: categorySystemName()">
                                <i class="icon" data-bind="css: icon()"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <a class="button" data-bind="click: submit">Toevoegen</a>
            </form>
        </form>
    </div>
</div>
