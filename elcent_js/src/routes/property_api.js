const express = require('express');
const { addProperty, getProperties, getPropertyById, bookProperty } = require('../controllers/propertyController');
const router = express.Router();

router.post('/add', addProperty);
router.get('/', getProperties);
router.get('/:id', getPropertyById);
router.post('/book', bookProperty);

module.exports = router;
