const express = require('express');
const router = express.Router();
const { processPayment } = require('../controllers/paymentController');

router.post('/pay', processPayment);

module.exports = router;
