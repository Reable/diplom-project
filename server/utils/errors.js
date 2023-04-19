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
