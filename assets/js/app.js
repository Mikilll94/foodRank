var $ = require('jquery');
var greet = require('./greet');

$(document).ready(function() {
    $('body').prepend('<h1>' + greet('john') + '</h1>');
});