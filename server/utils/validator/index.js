const ApiErrors = require('../errors');

module.exports = (rules, type = 'body') => (req, res, next) => {
    try{
        const errors = rules.validate(req[type]);

        if(errors.error){
            next(ApiErrors.Validation(errors.error.details, 422))
        }

        next()
    } catch(e){
        next( ApiErrors.Validation())
    }
}

