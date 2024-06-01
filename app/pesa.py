import requests
from requests.auth import HTTPBasicAuth
import base64
from datetime import datetime
from flask import current_app

def get_access_token():
    consumer_key = current_app.config['CONSUMER_KEY']
    consumer_secret = current_app.config['CONSUMER_SECRET']
    api_url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials"
    response = requests.get(api_url, auth=HTTPBasicAuth(consumer_key, consumer_secret))
    json_response = response.json()
    return json_response['access_token']

def lipa_na_mpesa_online(phone_number, amount, account_reference, transaction_desc):
    access_token = get_access_token()
    api_url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest"
    headers = { "Authorization": "Bearer %s" % access_token }
    
    timestamp = datetime.now().strftime('%Y%m%d%H%M%S')
    shortcode = current_app.config['MPESA_SHORTCODE']
    passkey = current_app.config['MPESA_PASSKEY']
    data_to_encode = shortcode + passkey + timestamp
    online_password = base64.b64encode(data_to_encode.encode()).decode('utf-8')

    payload = {
        "BusinessShortCode": shortcode,
        "Password": online_password,
        "Timestamp": timestamp,
        "TransactionType": "CustomerPayBillOnline",
        "Amount": amount,
        "PartyA": phone_number,
        "PartyB": shortcode,
        "PhoneNumber": phone_number,
        "CallBackURL": current_app.config['MPESA_CALLBACK_URL'],
        "AccountReference": account_reference,
        "TransactionDesc": transaction_desc
    }

    response = requests.post(api_url, json=payload, headers=headers)
    return response.json()
