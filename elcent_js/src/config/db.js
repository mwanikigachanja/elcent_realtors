const mongoose = require('mongoose');

const dbURI = process.env.MONGODB_URI || 'mongodb://localhost:27017/elcent';

mongoose.connect(dbURI, {
    useNewUrlParser: true,
    useUnifiedTopology: true
});

mongoose.connection.on('connected', () => {
    console.log('Mongoose is connected');
});

mongoose.connection.on('error', (err) => {
    console.log(`Could not connect to MongoDB. Error: ${err}`);
});
