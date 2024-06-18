const Blog = require('../models/Blog');

exports.addBlogPost = async (req, res) => {
    const { title, content, author } = req.body;

    try {
        const blogPost = new Blog({ title, content, author });
        await blogPost.save();
        res.status(201).json(blogPost);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

exports.getBlogPosts = async (req, res) => {
    try {
        const blogPosts = await Blog.find();
        res.status(200).json(blogPosts);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};
