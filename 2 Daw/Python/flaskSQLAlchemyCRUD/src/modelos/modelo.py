from config import db
from sqlalchemy.sql import func

class Student(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    firstname = db.Column(db.String(100), nullable=False)
    lastname = db.Column(db.String(100), nullable=False)
    email = db.Column(db.String(80), unique=True, nullable=False)
    age = db.Column(db.Integer)
    created_at = db.Column(db.DateTime(timezone=True),
                           server_default=func.now())
    bio = db.Column(db.Text)
    
    def __init__(self, firstname, lastname, email, age, bio):
        self.firstname = firstname
        self.lastname = lastname
        self.email = email
        self.age = age
        self.bio = bio

    def __repr__(self):
        return f'<Student {self.firstname}>'
