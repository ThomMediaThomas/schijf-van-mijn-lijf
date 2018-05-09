<div data-bind="with: entry">
    <div class="entry-details-image" data-bind="attr: { 'style': 'background-image: url(' + product().image + ');' }">
        <a class="close-button" data-bind="click: $parent.close"><i class="icon-close"></i></a>
        <div class="entry-details-brand" data-bind="visible: product().brand().image">
            <img data-bind="attr: { src: product().brand().image, title: product().brand().name, alt: product().brand().name}" />
        </div>
    </div>
    <div class="entry-details-heading" data-bind="css: categorySystemName">
        <h1 data-bind="text: product().name"></h1>
        <h2 data-bind="text: product().brand().name"></h2>
        <i class="icon" data-bind="css: icon()"></i>
    </div>
    <div class="content-wrapper">
        <h3>Voedingswaarde per <span data-bind="text: friendlyAmount()"></span></h3>
        <dl>
            <dt>Kilocalorieën</dt><dd data-bind="text: DISPLAYHELPER.ROUND(calories()) + ' kcal'">...</dd>
            <dt>Koolhydraten</dt><dd data-bind="text: DISPLAYHELPER.ROUND(carbs()) + ' gr'">...</dd>
            <dt>Eiwit</dt><dd data-bind="text: DISPLAYHELPER.ROUND(proteins()) + ' gr'">...</dd>
            <dt>Vet</dt><dd data-bind="text: DISPLAYHELPER.ROUND(fats()) + ' gr'">...</dd>
        </dl>
        <h3>Voedingswaarde per 100gr</h3>
        <dl data-bind="with: product">
            <dt>Kilocalorieën</dt><dd data-bind="text: DISPLAYHELPER.ROUND(calories) + ' kcal'">...</dd>
            <dt>Koolhydraten</dt><dd data-bind="text: DISPLAYHELPER.ROUND(carbs) + ' gr'">...</dd>
            <dt>Eiwit</dt><dd data-bind="text: DISPLAYHELPER.ROUND(proteins) + ' gr'">...</dd>
            <dt>Vet</dt><dd data-bind="text: DISPLAYHELPER.ROUND(fats) + ' gr'">...</dd>
        </dl>
    </div>
</div>
