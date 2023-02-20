import dbm
from shelve import DbfilenameShelf
import mysql.connector as mysql
from tabulate import tabulate
#datos de la base de datos
HOST = "localhost"
DATABASE = "dandelion"
USER = "david"
PASSWORD =  "1234"
#conexion a la base de datos
db_connection = mysql.connect(host = HOST, database=DATABASE, user=USER, password=PASSWORD)
cursor = db_connection.cursor()
imprimir(cursor)
def imprimir(cursor):
        cursor.execute("SELECT nombre,apellidos,users,mail FROM usuarios;")
        print("Usuarios de la base de datos:")
        print(tabulate(cursor, headers=cursor.column_names))
        for nombre, apellidos, users, mail in cursor.fetchall():
                print (nombre, apellidos, users, mail)
def newUser():
        print("Introduce tu nombre")
        nombre=input()
        print("Introduce tu apellidos")
        apellidos=input()
        print("Introduce tu usuario")
        usuario=input()
        print("Introduce tu contraseña")
        contraseña=input()
        print("Introduce tu mail")
        mail=input()
        cursor.execute("INSERT INTO usuarios VALUES( %s,%s,%s,%s,%s)", (nombre, apellidos, usuario, contraseña, mail))
        db_connection.commit()
        imprimir(cursor)
def deleteUser():
        print("Indica el usuario a eliminar. Introduce su nombre")
        nombre= input()
        cursor.execute("DELETE FROM usuarios WHERE nombre= %s", (nombre, ))
        db_connection.commit()
cursor.close()