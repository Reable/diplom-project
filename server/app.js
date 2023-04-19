require('dotenv').config({
    path: process.env.PRODACTION ? '.env.production' : '.env'
})

const express = require('express');

const app = express();

app.use(express.json());

app.use('/api', require('./routes'));

app.use(require('./utils/errorsHandler'));

async function bootstrap() {
    const PORT = process.env.PORT || 3000;
    app.listen(PORT, (error) => {
        if (error) {
            console.log(error);
        }
        console.log('Server is running')
    })
}

bootstrap();