// Вариант 2 вывода ошибок
class ApiError extends Error {
    constructor(){
        super();
    }

    BadRequest(message = 'Bad request', status = 400){
        this.message = message
        this.status = status

        return this
    }

    Validation(message = 'Error validation' || [], status = 422){
        if(Array.isArray(message)){
            const errors = [];

            for( let err of message){
                errors.push({
                    message: err.message,
                    key: err.context.key
                })
            }
            this.message = errors;
        } else {
            this.message = message;
        }

        this.status = status

        return this
    }
}

module.exports = new ApiError();

// Вариант 1 вывода ошибок
// class BadRequest extends Error {
//     constructor(message = 'Bad request', status = 400){
//         super(message);
//         this.status = status;
//     }
// }

// class Unauthorized extends Error {
//     constructor(message = 'User unauthorized', status = 422){
//         super(message);
//         this.status = status;
//     }
// }

// module.exports = {
//     BadRequest,
//     Unauthorized
// };
