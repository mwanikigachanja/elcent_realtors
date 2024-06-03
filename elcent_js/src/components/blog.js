import React, { useState, useEffect } from 'react';
import axios from 'axios';

const BlogList = () => {
    const [blogs, setBlogs] = useState([]);

    useEffect(() => {
        axios.get('/api/blogs')
            .then(response => {
                setBlogs(response.data);
            })
            .catch(error => {
                console.error('Error fetching blog posts:', error);
            });
    }, []);

    return (
        <div>
            <h1>Blog Posts</h1>
            {blogs.map(blog => (
                <div key={blog._id}>
                    <h2>{blog.title}</h2>
                    <p>{blog.content}</p>
                    <p>Author: {blog.author}</p>
                    <p>Published on: {new Date(blog.createdAt).toLocaleDateString()}</p>
                </div>
            ))}
        </div>
    );
};

export default BlogList;
