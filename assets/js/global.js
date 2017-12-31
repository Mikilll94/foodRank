require('../css/global.scss');
require('../images/throbber.gif');
require('../css/footer.scss');
require('../css/navbar.scss');
require('../js/login.js');
require('../images/avatars/avatar1.jpg');

const $ = require('jquery');
global.$ = global.jQuery = $;

// Only for development purposes
const alertify = require('alertifyjs');
global.alertify = alertify;

$(window).on('load', function() {
    $(".se-pre-con").fadeOut("slow");
});

