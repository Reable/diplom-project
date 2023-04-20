const sequelize = require('../database');
require('../models/users');

sequelize.sync({force: false, alter: true});

module.exports = sequelize;
