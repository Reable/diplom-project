const users = require('../../models/users');
const ApiErrors = require('../../utils/errors');

module.exports = {
    async create(data){

        const searchUser = await users.findOne({phone: data.phone});

        if(searchUser){
            throw ApiErrors.BadRequest('User already exists');
        }

        return users.create(data);
    }
}