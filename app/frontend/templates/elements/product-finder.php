<div id="product-finder" data-bind="with: productFinder, css: productFinder.state">

    <div id="product-finder-input">
        <div class="content-wrapper">
            <input type="text" id="term"/>
            <a id="product-finder-close" data-bind="click: close"><i class="icon-close"></i></a>
        </div>
    </div>
    <div id="product-finder-results">
        <div class="content-wrapper" data-bind="foreach: results">
            <div class="entry product-autocomplete" data-bind="click: $parent.selectProduct">
                <div class="content-wrapper entry-wrapper">
                    <div class="entry-image">
                        <img data-bind="attr: { src: image, alt: name, title: name }"/>
                    </div>
                    <div class="entry-content">
                        <h4 data-bind="text: name"></h4>
                        <h5>
                            <img data-bind="visible: brand.image, attr: { alt: brand.name, title: brand.name, src: brand.image }"/>
                            <span data-bind="text: brand.name"></span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
