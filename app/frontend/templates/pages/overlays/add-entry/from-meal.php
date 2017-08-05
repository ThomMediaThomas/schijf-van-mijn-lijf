<form id="form-from-meal" data-bind="with: fromMeal">
    <div class="heading">
        <h3>Maaltijd toevoegen</h3>
    </div>
    <div class="form-row">
        <label for="username">Maaltijd:</label>
        <input type="text" id="meal_id" name="meal_id" data-bind="value: meal_id">
    </div>
    <div class="form-row">
        <label for="username">Hoeveelheid:</label>
        <input type="number" id="amount" name="amount" data-bind="value: amount">
    </div>
    <div class="form-row">
        <label for="username">Dagdeel:</label>
        <select id="daypart_id" name="daypart_id" data-bind="value: daypart_id,
                        options: dayparts,
                        optionsText: function (daypart) { return daypart.name },
                        optionsValue: function (daypart) { return daypart.id },
                        optionsCaption: 'Kies een dagdeel...'">
        </select>
    </div>

    <a class="button" data-bind="click: submit">Toevoegen</a>
</form>
