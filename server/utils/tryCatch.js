module.exports = (controller) => async (req, res, next) => {
    try {
        await controller(req)
    } catch( err ){
        next(err)
    }
}