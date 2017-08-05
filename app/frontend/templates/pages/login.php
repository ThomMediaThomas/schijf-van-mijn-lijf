<script id="login" type="text/html">
    <div data-bind="with: $root.pages.login" class="page">
        <div class="content-wrapper">
            <form id="login-form">
                <div class="form-row">
                    <label for="username">Gebruikersnaam:</label>
                    <input class="required" type="text" id="username" name="username" data-bind="value: username">
                </div>
                <div class="form-row">
                    <label for="password">Wachtwoord:</label>
                    <input class="required" type="password" id="password" name="password" data-bind="value: password">
                </div>
                <a class="button" data-bind="click: login">Inloggen</a>
            </form>
        </div>
    </div>
</script>
