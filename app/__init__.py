from flask import Flask
from flask_sqlalchemy import SQLAlchemy
from flask_migrate import Migrate
from flask_login import LoginManager
from config import Config
from flask_mail import Mail

login = LoginManager()
login.login_view = 'login'

def create_app(config_class=Config):
    app = Flask(__name__)
    app.config['MAIL_SERVER'] = 'smtp.gmail.com'
    app.config['MAIL_PORT'] = 587
    app.config['MAIL_USE_TLS'] = True
    app.config['MAIL_USERNAME'] = 'your_email@gmail.com'
    app.config['MAIL_PASSWORD'] = 'your_email_password'

    mail = Mail(app)

    app.config.from_object(config_class)
    
    db.init_app(app)
    migrate.init_app(app, db)
    login.init_app(app)

    from app import routes, models
    app.register_blueprint(routes.bp)

    return app
