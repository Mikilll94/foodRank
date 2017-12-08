require('../css/app.scss');
var $ = require('jquery');
var greet = require('./greet');

$(document).ready(function() {
    console.log(greet('john'));
});