require('../css/global.scss');
require('../images/throbber.gif');

const $ = require('jquery');
global.$ = global.jQuery = $;

$(window).on('load', function() {
    $(".se-pre-con").fadeOut("slow");
});

