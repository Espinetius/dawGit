from flask import Flask
from flask_sqlalchemy import SQLAlchemy
from flask_marshmallow import Marshmallow
from dotenv import load_dotenv, find_dotenv
import os

# Lee la información existente en un archivo denominado .env
# Este es un archivo oculto en un servidor de producciómn y alberga
# las etiquetas y sus valores para la cadena de conexión a MongoDB

load_dotenv(find_dotenv())
usuario = os.environ.get("MYSQLDB_USUARIO")
password = os.environ.get("MYSQLDB_PASSWORD")
host = os.environ.get("MYSQLDB_HOST")
bd = os.environ.get("MYSQLDB_BD")

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = f'mysql+pymysql://{usuario}:{password}@{host}/{bd}'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.config['SECRET_KEY'] = 'hardsecretkey'  # Para las sesiones flash

db = SQLAlchemy(app)
ma = Marshmallow(app)

class EstudianteSchema(ma.Schema):
    class Meta:
        fields = ('id', 'nombre', 'apellido', 'apellido2')
