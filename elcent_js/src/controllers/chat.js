const Message = require('../models/Message');

exports.sendMessage = async (req, res) => {
    const { name, email, message } = req.body;

    try {
        const newMessage = new Message({ name, email, message });
        await newMessage.save();
        res.status(201).json(newMessage);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

exports.getMessages = async (req, res) => {
    try {
        const messages = await Message.find();
        res.status(200).json(messages);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};
