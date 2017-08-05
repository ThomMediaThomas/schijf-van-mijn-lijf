<script id="login" type="text/html">
    <div data-bind="with: $root.pages.login" class="page">
        <div class="content-wrapper">
            <form data-bind="submit: login">
                <div class="form-row">
                    <label for="username">Gebruikersnaam:</label>
                    <input type="text" id="username" name="username" data-bind="value: username">
                </div>
                <div class="form-row">
                    <label for="password">Wachtwoord:</label>
                    <input type="password" id="password" name="password" data-bind="value: password">
                </div>
                <a class="button" data-bind="click: login">Inloggen</a>
            </form>
        </div>
    </div>
</script>
