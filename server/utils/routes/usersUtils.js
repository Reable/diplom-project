const UsersController = require('../../controllers/users')

module.exports = {
    registration: async (req, res, next) => {
        await UsersController.registration(req.body)
            .then(data => res.json({data}).status(200))
            .catch(next)
    },
}