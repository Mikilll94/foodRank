var $ = require('jquery');

$(document).ready(function() {
    var maxHeight = Math.max.apply(null, $(".restaurant-thumbnail").map(function ()
    {
        return $(this).height();
    }).get());
    console.log("MAX HEIGHT", maxHeight);
});