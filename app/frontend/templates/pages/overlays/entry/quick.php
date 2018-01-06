<div data-bind="with: entry">
    <div class="entry-details-image" style="background-image: url('/files/images/quick-big.png');">
        <a class="close-button" data-bind="click: $parent.close"><i class="icon-close"></i></a>
    </div>
    <div class="entry-details-heading" data-bind="css: categorySystemName">
        <h1 data-bind="text: name"></h1>
    </div>
    <div class="content-wrapper">
        <h1>Voedingswaarde <span data-bind="text: name"></span></h1>
        <dl>
            <dt>Kilocalorieën</dt><dd data-bind="text: calories">...</dd>
        </dl>
    </div>
</div>
