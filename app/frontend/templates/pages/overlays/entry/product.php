<div data-bind="with: entry">
    <div class="entry-details-image" data-bind="attr: { 'style': 'background-image: url(' + product().image + ');' }">
        <a class="close-button" data-bind="click: $parent.close"><i class="icon-close"></i></a>
    </div>
    <div class="entry-details-heading" data-bind="css: categorySystemName">
        <h1 data-bind="text: product().name"></h1>
        <h2 data-bind="text: product().brand().name"></h2>
        <i class="icon" data-bind="css: icon()"></i>
    </div>
    <div class="content-wrapper">
        <h3>Voedingswaarde per <span data-bind="text: portion().friendlyName"></span></h3>
        <dl>
            <dt>Kilocalorieën</dt><dd data-bind="text: calories">...</dd>
            <dt>Koolhydraten</dt><dd data-bind="text: carbs">...</dd>
            <dt>Eiwit</dt><dd data-bind="text: proteins">...</dd>
            <dt>Vet</dt><dd data-bind="text: fats">...</dd>
        </dl>
        <h3>Voedingswaarde per 100gr</h3>
        <dl data-bind="with: product">
            <dt>Kilocalorieën</dt><dd data-bind="text: calories">...</dd>
            <dt>Koolhydraten</dt><dd data-bind="text: carbs">...</dd>
            <dt>Eiwit</dt><dd data-bind="text: proteins">...</dd>
            <dt>Vet</dt><dd data-bind="text: fats">...</dd>
        </dl>
    </div>
</div>
