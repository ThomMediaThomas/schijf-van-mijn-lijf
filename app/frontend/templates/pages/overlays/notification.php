<div id="notification" data-bind="with: notificator, css: notificator.cssClass, click: notificator.close"">
    <div class="content-wrapper">
        <span data-bind="text: message"></span>
        <a id="close-notification" data-bind="click: close"><i class="icon-close"></i></a>
    </div>
</div>
