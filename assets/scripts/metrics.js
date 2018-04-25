;(function (window, document, $) {
    $(document).on('click', '[data-metrics-goal]', function (event) {
        var goal = $(event.target).data('metrics-goal');

        yaCounterXXX.reachGoal(goal);

        ga('send', {
            hitType: 'event',
            eventAction: 'click',
            eventLabel: goal
        });
    });
})(window, document, jQuery);
