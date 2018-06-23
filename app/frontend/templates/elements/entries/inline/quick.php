<script id="quick_inline" type="text/html">
    <div class="entry in-content" data-bind="css: classNameWithoutSelection()">
        <div class="entry-wrapper" data-bind="click: {single: toggle, double: select }">
            <div class="entry-image">
                <img data-bind="attr: { src: '/files/images/quick.png', alt: name, title: name }"/>
            </div>
            <div class="entry-content">
                <h4 data-bind="text: name"></h4>
                <h5><span data-bind="text: calories"></span> kilocalorieën</h5>
            </div>
        </div>
    </div>
</script>
