const Joi = require('joi')

module.exports = {
    registration: Joi.object({
        phone: Joi.string().required(),
        name: Joi.string().required(),
        password: Joi.string().pattern(new RegExp('^[a-zA-Z0-9]{3,30}$')).required(),
    }),

}