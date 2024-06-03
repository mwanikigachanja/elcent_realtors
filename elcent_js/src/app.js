const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const cors = require('cors');
const dotenv = require('dotenv');

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
