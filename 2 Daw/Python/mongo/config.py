from flask import Flask #datos de conexión a Mongodb Atlas 
host = 'cluster0.mnry1st.mongodb.net' 
usuario = 'david' 
passwd = 'Defender1234' 
bd = 'test'
app = Flask(__name__) 
# Para conexiones en la nube se requiere tener instalado el paquete dnspython 
# Se ejecuta el comando: py -m pip install pymongo[srv] 
app.config['MONGO_URI'] = f'mongodb+srv://{usuario}:{passwd}@{host}/{bd}'