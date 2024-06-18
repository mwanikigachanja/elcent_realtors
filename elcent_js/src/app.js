import React from 'react';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import PropertyList from './components/PropertyList';
import BlogList from './components/BlogList';
import ContactAdmin from './components/ContactAdmin';
const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const cors = require('cors');
const dotenv = require('dotenv');


const App = () => {
    return (
        <Router>
            <div>
                <nav>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/properties">Properties</a></li>
                        <li><a href="/blogs">Blog</a></li>
                        <li><a href="/contact">Contact Admin</a></li>
                    </ul>
                </nav>
                <Switch>
                    <Route path="/properties" component={PropertyList} />
                    <Route path="/blogs" component={BlogList} />
                    <Route path="/contact" component={ContactAdmin} />
                </Switch>
            </div>
        </Router>
    );
};

export default App;


dotenv.config();

const app = express();
app.use(bodyParser.json());
app.use(cors());

// Database configuration
require('./config/db');

// Import routes
const paymentRoutes = require('./routes/paymentRoutes');
const propertyRoutes = require('./routes/propertyRoutes');
const blogRoutes = require('./routes/blogRoutes');
const chatRoutes = require('./routes/chatRoutes');

// Use routes
app.use('/api/payments', paymentRoutes);
app.use('/api/properties', propertyRoutes);
app.use('/api/blogs', blogRoutes);
app.use('/api/chats', chatRoutes);

const PORT = process.env.PORT || 5000;
app.listen(PORT, () => console.log(`Server running on port ${PORT}`));
