const route = require('express').Router();
const users = require('../../utils/routes/usersUtils');

route.post('/registration', users.registration);

module.exports = route;