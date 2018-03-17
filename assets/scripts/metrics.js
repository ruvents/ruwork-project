$(document)
    .ready(function () {
        $('[data-metrics-goal]').click(function () {
            var goal = $(this).data('metrics-goal');
            yaCounterXXX.reachGoal(goal);
        })
    })
