<script id="login" type="text/html">
    <div data-bind="with: $root.pages.login" class="page">
        <div class="content-wrapper">
            <div class="heading">
                <h3>Welkom terug?</h3>
            </div>
            <form id="login-form">
                <div class="form-row">
                    <label for="username">Gebruikersnaam:</label>
                    <input class="required" type="text" id="username" name="username" data-bind="value: username">
                </div>
                <div class="form-row">
                    <label for="password">Wachtwoord:</label>
                    <input class="required" type="password" id="password" name="password" data-bind="value: password">
                </div>
                <a class="button" data-bind="click: login, css: loadingClass">Inloggen</a>
            </form>
            <div class="heading">
                <h3>Ben je hier voor het eerst?</h3>
            </div>
            <p>Schijf van mijn Lijf is een handige tool die jou kan helpen gezonder te eten. We helpen je graag bij het bepalen van een doel en ondersteunen je daar bij.</p>
            <a class="button small" data-bind="click: function() { APP.navigate('register'); return false; }">Registreren</a>
        </div>
    </div>
</script>
