module.exports = (error, req, res, next) => {
    console.log(error.message)
    res.status(error.status)
        .json(
            process.env.PRODACTION
            ?{
                statusCode: error.status,
                message: error.message,
            }
            :{
                statusCode: error.status,
                message: error.message,
                stack: error.stack,
            }
        )
}