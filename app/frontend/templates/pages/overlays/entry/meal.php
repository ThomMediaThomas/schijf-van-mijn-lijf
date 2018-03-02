<div data-bind="with: entry">
    <div class="entry-details-image" style="background-image: url('/files/images/meal-big.png');">
        <a class="close-button" data-bind="click: $parent.close"><i class="icon-close"></i></a>
    </div>
    <div class="entry-details-heading" data-bind="css: categorySystemName">
        <h1 data-bind="text: meal().name"></h1>
    </div>
    <div class="content-wrapper">
        <h3>Voedingswaarde</h3>
        <dl>
            <dt>Kilocalorieën</dt><dd data-bind="text: DISPLAYHELPER.ROUND(calories())">...</dd>
            <dt>Koolhydraten</dt><dd data-bind="text: DISPLAYHELPER.ROUND(carbs()) + ' gr'">...</dd>
            <dt>Eiwit</dt><dd data-bind="text: DISPLAYHELPER.ROUND(proteins()) + ' gr'">...</dd>
            <dt>Vet</dt><dd data-bind="text: DISPLAYHELPER.ROUND(fats()) + ' gr'">...</dd>
        </dl>
        <h3>Ingrediënten</h3>
        <div class="meal-products" data-bind="foreach: meal().products">
            <div class="entry" data-bind="css: className()">
                <div class="content-wrapper entry-wrapper" data-bind="click: toggle">
                    <div class="entry-image" data-bind="with: product()">
                        <img data-bind="attr: { src: image, alt: name, title: name }"/>
                    </div>
                    <div class="entry-content">
                        <h4 data-bind="text: product().name"></h4>
                        <h5><strong data-bind="text: friendlyAmount"></strong> - <span data-bind="text: calories"></span> kilocalorieën
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
</div>
