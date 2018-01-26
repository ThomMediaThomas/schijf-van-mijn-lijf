<div id="footer" data-bind="if: currentPage() == 'entries', css: footer.state, click: footer.toggle">
    <div id="footer-inner">
        <div id="footer-handle">
            <i class="icon-circle-up" data-bind="css: footer.stateIcon"></i>
        </div>
        <div class="content-wrapper" data-bind="with: pages.entries">
            <div class="footer-element">
                <span class="percentage-wrapper">
                    <span class="percentage" data-bind="attr: { style: 'width:' + caloriesForTodayPercentage() + '%' }"></span>
                </span>
                <span class="percentage-label">
                    <span data-bind="text: caloriesForToday"></span> kilocalorieën gebruikt (van <span data-bind="text: caloriesGoal"></span>).
                </span>
            </div>
            <div class="footer-element show-on-open bordered">
                <strong class="footer-element-header">Macronutriënten</strong>
                <div class="footer-element-column">
                    <span class="percentage-wrapper-vertical carbs">
                        <span class="percentage" data-bind="attr: { style: 'height:' + carbsForTodayPercentage() + '%' }"></span>
                        <strong data-bind="text: carbsForTodayPercentage() + '%'"></strong>
                    </span>
                    <span class="percentage-label">
                        koolhydraten
                    </span>
                </div>
                <div class="footer-element-column">
                    <span class="percentage-wrapper-vertical proteins">
                        <span class="percentage" data-bind="attr: { style: 'height:' + proteinsForTodayPercentage() + '%' }"></span>
                        <strong data-bind="text: proteinsForTodayPercentage() + '%'"></strong>
                    </span>
                    <span class="percentage-label">
                        eiwitten
                    </span>
                </div>
                <div class="footer-element-column">
                    <span class="percentage-wrapper-vertical fats">
                        <span class="percentage" data-bind="attr: { style: 'height:' + fatsForTodayPercentage() + '%' }"></span>
                        <strong data-bind="text: fatsForTodayPercentage() + '%'"></strong>
                    </span>
                    <span class="percentage-label">
                        vetten
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
