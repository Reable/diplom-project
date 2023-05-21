const argon = require('argon2'); // https://stytch.com/blog/argon2-vs-bcrypt-vs-scrypt/

module.exports = {
    async create(string){
        return argon.hash(string);
    },
    async verify(hashString, string){
        return argon.verify(hashString, string);
    }
}