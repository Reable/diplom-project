const sequelize = require('../database');
const { DataTypes } = require('sequelize')

const Users = sequelize.define('users', {
    id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true
    },
    role: {
        type: DataTypes.STRING,

    }
}, {
    sequelize,
    timestamps: true,
    tableName: 'users'
})

module.exports = Users;