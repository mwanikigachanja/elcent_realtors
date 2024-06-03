const express = require('express');
const { addBlogPost, getBlogPosts } = require('../controllers/blogController');
const router = express.Router();

router.post('/add', addBlogPost);
router.get('/', getBlogPosts);

module.exports = router;
