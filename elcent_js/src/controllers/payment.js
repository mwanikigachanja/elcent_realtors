const { mpesaPayment } = require('../config/mpesa');
const nodemailer = require('nodemailer');
const twilio = require('twilio');
const PDFDocument = require('pdfkit');

const processPayment = async (req, res) => {
    const { phoneNumber, amount, email, userName } = req.body;

    try {
        const paymentResponse = await mpesaPayment(phoneNumber, amount);

        // Send SMS notification
        const twilioClient = twilio(process.env.TWILIO_ACCOUNT_SID, process.env.TWILIO_AUTH_TOKEN);
        twilioClient.messages.create({
            body: `Payment of KES ${amount} received. Transaction ID: ${paymentResponse.CheckoutRequestID}.`,
            from: process.env.TWILIO_PHONE_NUMBER,
            to: phoneNumber
        });

        // Send email notification
        const transporter = nodemailer.createTransport({
            service: 'gmail',
            auth: {
                user: process.env.EMAIL_USERNAME,
                pass: process.env.EMAIL_PASSWORD
            }
        });

        const mailOptions = {
            from: process.env.EMAIL_USERNAME,
            to: email,
            subject: 'Payment Confirmation',
            text: `Dear ${userName}, your payment of KES ${amount} was successful. Transaction ID: ${paymentResponse.CheckoutRequestID}.`
        };

        await transporter.sendMail(mailOptions);

        // Generate PDF receipt
        const doc = new PDFDocument();
        doc.text(`Payment Receipt\n\nTransaction ID: ${paymentResponse.CheckoutRequestID}\nAmount: KES ${amount}\n`);
        doc.end();

        res.status(200).json({
            success: true,
            message: 'Payment processed successfully',
            transactionId: paymentResponse.CheckoutRequestID
        });
    } catch (error) {
        res.status(500).json({
            success: false,
            message: 'Payment processing failed',
            error: error.message
        });
    }
};

module.exports = { processPayment };
