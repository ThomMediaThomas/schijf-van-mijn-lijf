<form id="form-from-quick" data-bind="with: fromQuick">
    <div class="heading">
        <h3>Snel toevoegen</h3>
    </div>
    <div class="form-row">
        <label for="username">Naam:</label>
        <input type="text" id="name" name="name" data-bind="value: name">
    </div>
    <div class="form-row">
        <label for="username">Caloriën:</label>
        <input type="text" id="calories" name="calories" data-bind="value: calories">
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
