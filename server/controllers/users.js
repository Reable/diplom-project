// const {BadRequest}  = require("../utils/errors")
const ApiError = require('../utils/errors')


module.exports = {
    async registration(data){
        if(!Object.keys(data).length){
            throw ApiError.BadRequest('Testing error')
        }
        
        return 'hello'
    }
}