from database import db
from sqlalchemy.sql import func

# Para crear las tablas, desde el entorno de ejecución de Python, ejecutar:
# from database import app, db
# from estudiante import Estudiante
# app.app_context().push()
# db.create_all()

class Estudiante(db.Model):
    
    __tablename__ = 'Estudiantes'
         
    id = db.Column(db.Integer, primary_key=True)
    nombre = db.Column(db.String(50), nullable=False)
    apellido = db.Column(db.String(255), nullable=False)
    apellido2 = db.Column(db.String(255), nullable=True)
     
    def __init__(self, nombre, apellido, apellido2):
        self.nombre = nombre
        self.apellido = apellido
        self.apellido2 = apellido2

    def __repr__(self):
        return f'<Estudiante {self.id}>: {self.nombre}, {self.apellido}, {self.apellido2}'
    
    