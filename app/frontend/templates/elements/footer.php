<div id="footer" data-bind="if: currentPage() == 'entries'">
    <div class="content-wrapper" data-bind="with: pages.entries">
        <span class="percentage-wrapper">
            <span class="percentage" data-bind="attr: { style: 'width:' + caloriesForTodayPercentage() + '%' }"></span>
        </span>
        <span class="percentage-label">
            <span data-bind="text: caloriesForToday"></span> calorieën gebruikt.
        </span>
    </div>
</div>
