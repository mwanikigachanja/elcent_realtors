from flask import render_template, flash, redirect, url_for, request, Blueprint
from flask_login import current_user, login_user, logout_user, login_required
from app import db
from app.models import User, Property, Booking
from app.forms import LoginForm, RegistrationForm, PropertyForm
from werkzeug.urls import url_parse

bp = Blueprint('routes', __name__)

@bp.route('/')
@bp.route('/index')
def index():
    properties = Property.query.all()
    return render_template('index.html', title='Home', properties=properties)

@bp.route('/login', methods=['GET', 'POST'])
def login():
    if current_user.is_authenticated:
        return redirect(url_for('index'))
    form = LoginForm()
    if form.validate_on_submit():
        user = User.query.filter_by(username=form.username.data).first()
        if user is None or not user.check_password(form.password.data):
            flash('Invalid username or password')
            return redirect(url_for('login'))
        login_user(user, remember=form.remember_me.data)
        next_page = request.args.get('next')
        if not next_page or url_parse(next_page).netloc != '':
            next_page = url_for('index')
        return redirect(next_page)
    return render_template('login.html', title='Sign In', form=form)

@bp.route('/logout')
def logout():
    logout_user()
    return redirect(url_for('index'))

@bp.route('/register', methods=['GET', 'POST'])
def register():
    if current_user.is_authenticated:
        return redirect(url_for('index'))
    form = RegistrationForm()
    if form.validate_on_submit():
        user = User(username=form.username.data, email=form.email.data)
        user.set_password(form.password.data)
        db.session.add(user)
        db.session.commit()
        flash('Congratulations, you are now a registered user!')
        return redirect(url_for('login'))
    return render_template('register.html', title='Register', form=form)

@bp.route('/property/new', methods=['GET', 'POST'])
@login_required
def new_property():
    form = PropertyForm()
    if form.validate_on_submit():
        property = Property(title=form.title.data, description=form.description.data, price=form.price.data, location=form.location.data, owner=current_user)
        db.session.add(property)
        db.session.commit()
        flash('Your property has been listed!')
        return redirect(url_for('index'))
    return render_template('new_property.html', title='New Property', form=form)

@bp.route('/property/<int:property_id>')
def property_detail(property_id):
    property = Property.query.get_or_404(property_id)
    return render_template('property_detail.html', title=property.title, property=property)

@bp.route('/book/<int:property_id>', methods=['POST'])
@login_required
def book_property(property_id):
    property = Property.query.get_or_404(property_id)
    booking = Booking(user_id=current_user.id, property_id=property.id)
    db.session.add(booking)
    db.session.commit()
    flash('Property booked successfully!')
    return redirect(url_for('property_detail', property_id=property.id))
