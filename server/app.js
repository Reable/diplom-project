const path = require('path');
require('dotenv').config({ 
    path: 
        Boolean(process.env.PRODUCTION) 
        ? path.resolve('.env.production') 
        : path.resolve('.env')
})

require('./database');

//Migrations
process.env.DB_MIGRATIONS && require('./migrations');

const express = require('express');

const app = express();

app.use(express.json());

app.use('/api', require('./routes'));

app.use(require('./utils/errorsHandler'));

async function bootstrap() {
    const PORT = process.env.PORT
    app.listen(PORT, (error) => {
        if (error) {
            console.log(error);
        }
        console.log('Server is running on PORT ', PORT)
    })
}

bootstrap();