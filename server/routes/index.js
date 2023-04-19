const express = require('express');
const router = new express();

router.use('/users', require('./users'));

module.exports = router;