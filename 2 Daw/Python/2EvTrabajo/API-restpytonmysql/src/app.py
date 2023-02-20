from flask import Flask, jsonify
from flask_mysqldb import MySQL
from config import config

app = Flask(__name__)
conexion = MySQL(app)
#video que estoy siguiendo --> https://www.youtube.com/watch?v=D6LZnrDbQPM&ab_channel=UskoKruM2010

@app.route('/asignaturas')
def asignaturas():
    try:
        cursor = conexion.connection.cursor()
        sql = "SELECT id, imgasig, asignatura, nomprofe FROM profesores"
        cursor.execute(sql)
        datos = cursor.fetchall()
        cursos = []
        for fila in datos:
            curso = {'id': fila[0], 'foto': fila[1],
                     'nomasig': fila[2], 'nomprof': fila[3]}
            cursos.append(curso)
        return jsonify({'cursos': cursos})
        return
    except Exception as e:
        return 'Error'


def web_not_found(error):
    return 'No existe'


if __name__ == '__main__':
    app.config.from_object(config['development'])
    app.register_error_handler(404, web_not_found)
    app.run()
