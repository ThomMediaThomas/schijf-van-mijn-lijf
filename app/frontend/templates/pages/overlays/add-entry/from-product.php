<form id="form-from-product" data-bind="with: fromProduct">
    <div class="heading">
        <h3>Product toevoegen</h3>
    </div>
    <div class="form-row">
        <label for="username">Product:</label>
        <input class="required" type="text" id="product_id" name="product_id" data-bind="value: product_id, disable: $parent.isEdit">
    </div>
    <div class="form-row">
        <label for="username">Hoeveelheid:</label>
        <div class="form-row-inner quart">
            <input class="number required" type="number" id="amount" name="amount" data-bind="value: amount">
        </div>
        <div class="form-row-inner three-quart">
            <select class="required" id="portion_id" name="portion_id" data-bind="value: portion_id,
                        options: portions,
                        optionsText: function (portion) { return portion.friendlyName },
                        optionsValue: function (portion) { return portion.id },
                        optionsCaption: 'Kies een portie...'">
            </select>
        </div>
    </div>
    <div class="form-row">
        <label for="username">Dagdeel:</label>
        <select class="required" id="daypart_id" name="daypart_id" data-bind="value: daypart_id,
                        options: dayparts,
                        optionsText: function (daypart) { return daypart.name },
                        optionsValue: function (daypart) { return daypart.id },
                        optionsCaption: 'Kies een dagdeel...'">
        </select>
    </div>
    <a class="button" data-bind="click: submit, text: $parent.buttonName(), css: loadingClass"></a>
</form>
