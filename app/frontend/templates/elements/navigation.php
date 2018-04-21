<div id="nav" data-bind="with: navigation, css: navigation.state">
    <div id="nav-menu">
        <div id="user-info">
            <div class="content-wrapper">
                <div class="user-info-left">
                    <div class="avatar">
                        <img data-bind="attr: { src: avatar() }" />
                    </div>
                </div>
                <div class="user-info-right">
                    <h4 data-bind="text: heading"></h4>
                    <h5 data-bind="html: intro"></h5>
                </div>
            </div>
        </div>
        <ul data-bind="foreach: pages">
            <li data-bind="css: css">
                <div class="content-wrapper">
                    <a data-bind="click: action">
                        <i data-bind="css: 'icon-' + icon"></i>
                        <span data-bind="text: title"></span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <div id="nav-bg" data-bind="click: toggle">
        <i class="icon-close"></i>
    </div>
</div>
