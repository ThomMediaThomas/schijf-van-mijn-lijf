<script id="product_inline" type="text/html">
    <div class="entry in-content" data-bind="css: classNameWithoutSelection()">
        <div class="entry-wrapper" data-bind="click: {single: toggle, double: select }">
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
</script>
