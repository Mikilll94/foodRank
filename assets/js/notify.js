'use strict';

require('../css/alertify.scss');

const alertify = require('alertifyjs');
// Only for development purposes
global.alertify = alertify;

module.exports = function(type, message, position) {
    alertify.set('notifier','position', position);
    alertify.notify(message, `custom-${type}`, 5);
};