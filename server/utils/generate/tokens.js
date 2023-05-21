const jwt = require('jsonwebtoken');
const ApiErrors = require('../errors')

module.exports = {
    async create(data){
        try{
            return await jwt.sign(data , process.env.SECRET_KEY, { expiresIn: process.env.SECRET_TOKEN_LIFE })
        } catch(err){
            throw ApiErrors.BadRequest(err)
        }
    },

    async verify(data){
        try{
            return await jwt.verify(data, process.env.SECRET_KEY)
        } catch(err){
            throw ApiErrors.BadRequest(err)
        }
    }
}