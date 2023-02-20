from config import db
from sqlalchemy.sql import func

class Profesor(db.Model):
    id= db.Column(db.Integer, primary_key=True)
    profesor = db.Column(db.String(255))
    asignatura = db.Column(db.String(255))

    def __init__(self, id, profesor, asignatura):
        self.id=id
        self.profesor=profesor
        self.asignatura=asignatura
        
    def __repr__(self):
        return f'<Profesor {self.profesor}'