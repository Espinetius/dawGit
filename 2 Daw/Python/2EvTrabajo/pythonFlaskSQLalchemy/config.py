from flask import Flask
from flask_sqlalchemy import SQLAlchemy

# Datos de conexión a db4Free
"""
host = 'db4free.net'
usuario = ''
passwd = ''
bd = '' 
ssl_mode = "VERIFY_IDENTITY"
ssl = {
    "ca": "/etc/ssl/cert.pem"
}  
"""
host = 'localhost'
usuario = 'dwes'
passwd = 'dwes'
bd = '2evtrabajo'

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = f'mysql+pymysql://{usuario}:{passwd}@{host}/{bd}'
# app.config['SQLALCHEMY_DATABASE_URI'] = f'mysql+pymysql://{usuario}:{passwd}@{host}/{bd}?ssl={ssl}'      

app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)        