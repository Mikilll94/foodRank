require('../css/global.scss');
require('../css/footer.scss');
require('../css/navbar.scss');
require('../images/throbber.gif');
require('../images/default_avatar_male.jpg');
require('../js/login.js');

const $ = require('jquery');
global.$ = global.jQuery = $;

// Only for development purposes
const alertify = require('alertifyjs');
global.alertify = alertify;

$(window).on('load', function() {
    $(".se-pre-con").fadeOut("slow");
});

