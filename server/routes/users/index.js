const route = require('express').Router();
const users = require('../../utils/routes/usersUtils');
const validator = require('../../utils/validator');
const rules = require('../../utils/validator/users');

route.post('/registration', validator(rules.registration), users.registration);
// route.post('/authorization', rules.authorization, validator, users.registration);

module.exports = route;