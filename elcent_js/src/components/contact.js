import React, { useState } from 'react';
import axios from 'axios';

const ContactAdmin = () => {
    const [name, setName] = useState('');
    const [email, setEmail] = useState('');
    const [message, setMessage] = useState('');

    const handleSubmit = (e) => {
        e.preventDefault();
        axios.post('/api/chats/send', { name, email, message })
            .then(response => {
                console.log('Message sent:', response.data);
                setName('');
                setEmail('');
                setMessage('');
                alert('Message sent successfully');
            })
            .catch(error => {
                console.error('Error sending message:', error);
                alert('Failed to send message');
            });
    };

    return (
        <div>
            <h1>Contact Admin</h1>
            <form onSubmit={handleSubmit}>
                <div>
                    <label>Name:</label>
                    <input type="text" value={name} onChange={(e) => setName(e.target.value)} required />
                </div>
                <div>
                    <label>Email:</label>
                    <input type="email" value={email} onChange={(e) => setEmail(e.target.value)} required />
                </div>
                <div>
                    <label>Message:</label>
                    <textarea value={message} onChange={(e) => setMessage(e.target.value)} required></textarea>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </div>
    );
};

export default ContactAdmin;
