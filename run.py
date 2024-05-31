from app import create_app, db
from app.models import User, Property, Booking

app = create_app()

@app.shell_context_processor
def make_shell_context():
    return {'db': db, 'User': User, 'Property': Property, 'Booking': Booking}

if __name__ == '__main__':
    app.run(debug=True)
