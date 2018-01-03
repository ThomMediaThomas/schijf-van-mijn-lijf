<script id="addProduct" type="text/html">
    <div id="add-product-page" class="page" data-bind="with: $root.pages.addProduct">
        <div class="content-wrapper">
            <form id="add-product-form" enctype="multipart/form-data">
                <div class="heading">
                    <h3>Product toevoegen</h3>
                </div>
                <p>Help jezelf en anderen door het toevoegen van een nieuw product.</p>
                <div class="heading sub">
                    <h3>Algemene informatie</h3>
                </div>
                <div class="form-row">
                    <label for="name">Naam:</label>
                    <input class="required" type="text" id="name" name="name" data-bind="value: name">
                </div>
                <div class="form-row">
                    <label for="brand">Merk:</label>
                    <input class="required" type="text" id="brand" name="brand" data-bind="value: brand">
                </div>
                <div class="form-row">
                    <label for="subcategory_id">Category:</label>
                    <select class="required" id="subcategory_id" name="subcategory_id" data-bind="value: subcategory_id,
                        options: subcategories,
                        optionsText: function (subcategory) { return subcategory.name },
                        optionsValue: function (subcategory) { return subcategory.id },
                        optionsCaption: 'Kies een categorie...'">
                    </select>
                </div>
                <div class="form-row">
                    <label for="image-upload">Afbeelding:</label>
                    <input class="required" type="file" id="image-upload" name="image"  />
                </div>
                <div class="heading sub">
                    <h3>Voedingswaarde</h3>
                </div>
                <div class="form-row">
                    <label for="calories">Calorieën per 100gr:</label>
                    <input class="required number" type="text" id="calories" name="calories" data-bind="value: calories">
                </div>
                <div class="form-row">
                    <label for="carbs">Koolhydraten per 100gr:</label>
                    <input class="required number" type="text" id="carbs" name="carbs" data-bind="value: carbs">
                </div>
                <div class="form-row">
                    <label for="proteins">Eiwitten per 100gr:</label>
                    <input class="required number" type="text" id="proteins" name="proteins" data-bind="value: proteins">
                </div>
                <div class="form-row">
                    <label for="fat">Vet per 100gr:</label>
                    <input class="required number" type="text" id="fat" name="fat" data-bind="value: fat">
                </div>
                <div class="heading sub">
                    <h3>Porties</h3>
                </div>
                <div class="add-portions" data-bind="foreach: portions">
                    <div class="form-group">
                        <div class="form-row">
                            <label for="portion_name">Naam:</label>
                            <input class="number" type="text" id="portion_name" name="portion_name" data-bind="value: name">
                        </div>
                        <div class="form-row">
                            <label for="portion_unit">Hoeveelheid:</label>
                            <div class="form-row-inner three-quart">
                                <input class="required number" type="number" id="portion_unit" name="portion_unit" data-bind="value: size">
                            </div>
                            <div class="form-row-inner quart">
                                <select class="required" id="portion_unit" name="portion_unit" data-bind="value: unit">
                                    <option>gr</option>
                                    <option>ml</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="button small" data-bind="click: addPortion">Portie toevoegen</a>
                <a class="button" data-bind="click: submit">Toevoegen</a>
            </form>
        </div>
    </div>
</script>
