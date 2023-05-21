const UserDTO = require('../dto/users');
const bearerToken = require('../utils/generate/tokens');
const hash = require('../utils/generate/hash');

module.exports = {
    async registration(data){
        data.password = await hash.create(data.password);

        const user = await UserDTO.create( data );
        const token = await bearerToken.create({id: user.id});

        return {token};
    }
}