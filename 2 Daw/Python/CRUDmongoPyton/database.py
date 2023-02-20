from pymongo import MongoClient
import certifi
from dotenv import load_dotenv, find_dotenv
import os

load_dotenv(find_dotenv)
host = os.environ.get("MONGO_HOST")
user = os.environ.get("MONGO_USUARIO")
password = os.environ.get("MONGO_PASSWORD")
db = os.environ.get("MONGO_BD")



MONGO_URI = f'mongodb+srv://{user}:{password}@{host}/?retryWrites=true&w=majority'
ca = certifi.where()

def dbConnection():
        try:
            client = MongoClient(MONGO_URI, tlsCAFile=ca)
            db = client["dbb_products_app"]
        except ConnectionError:
                print('Error de conexion con la bdd')
        return db