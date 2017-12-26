require('../css/global.scss');
require('../images/throbber.gif');
require('../css/footer.scss');
require('../css/navbar.scss');
require('../js/login.js');

const $ = require('jquery');
global.$ = global.jQuery = $;

$(window).on('load', function() {
    $(".se-pre-con").fadeOut("slow");
});

