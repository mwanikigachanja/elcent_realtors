import os

class Config:
    SECRET_KEY = os.environ.get('SECRET_KEY') or 'a_really_secret_key'
    SQLALCHEMY_DATABASE_URI = os.environ.get('DATABASE_URL') or 'mysql://username:password@localhost/elcent_realtors'
    SQLALCHEMY_TRACK_MODIFICATIONS = False
