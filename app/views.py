from flask import render_template, flash, redirect, url_for, request, current_app, jsonify
from flask_login import current_user, login_required
from app import db
from app.models import Property, Booking
from app.forms import PropertyForm
from app.mpesa import lipa_na_mpesa_online
from app.routes import bp

@bp.route('/pay/<int:property_id>', methods=['POST'])
@login_required
def pay(property_id):
    property = Property.query.get_or_404(property_id)
    phone_number = request.form['phone_number']
    amount = property.price
    account_reference = property.title
    transaction_desc = f"Payment for {property.title}"
    response = lipa_na_mpesa_online(phone_number, amount, account_reference, transaction_desc)
    if response.get('ResponseCode') == '0':
        flash('Payment initiated successfully. Check your phone to complete the transaction.')
    else:
        flash('Failed to initiate payment. Please try again.')
    return redirect(url_for('routes.property_detail', property_id=property_id))
