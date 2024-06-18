const axios = require('axios');
const dotenv = require('dotenv');
dotenv.config();

const mpesaPayment = async (phoneNumber, amount) => {
    try {
        const response = await axios.post('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest', {
            // MPESA request body
        }, {
            headers: {
                'Authorization': `Bearer ${process.env.MPESA_ACCESS_TOKEN}`
            }
        });
        return response.data;
    } catch (error) {
        console.error('MPESA payment error:', error);
        throw error;
    }
};

module.exports = { mpesaPayment };
