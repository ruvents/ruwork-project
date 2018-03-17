$.fn.frujax.callbacks = {
    onOptions: [
        function (options) {
            options.headers['Frujax-Block'] = options.block
        }
    ]
}

$.fn.frujax.defaults.history = false
