Se necesita instalar al menos los siguientes paquetes:

flask, flask-sqlalchemy, pymysql

Y para hacer la migración (crear tabla en BD), ejecutar desde un terminal lo siguiente:

py
from app import app
from config import db
app.app_context().push()
db.create_all()