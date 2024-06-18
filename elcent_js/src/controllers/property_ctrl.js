const Property = require('../models/Property');

exports.addProperty = async (req, res) => {
    const { title, description, location, price, size, amenities, images } = req.body;

    try {
        const property = new Property({ title, description, location, price, size, amenities, images });
        await property.save();
        res.status(201).json(property);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

exports.getProperties = async (req, res) => {
    try {
        const properties = await Property.find();
        res.status(200).json(properties);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

exports.getPropertyById = async (req, res) => {
    try {
        const property = await Property.findById(req.params.id);
        if (!property) {
            return res.status(404).json({ message: 'Property not found' });
        }
        res.status(200).json(property);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

exports.bookProperty = async (req, res) => {
    const { userId, propertyId } = req.body;

    try {
        // Handle booking logic here (e.g., update property status, notify admin, etc.)
        res.status(200).json({ message: 'Property booked successfully' });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};
