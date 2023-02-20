from flask import Flask, render_template, flash, request, Response, jsonify, redirect, url_for
from database import app, db, EstudianteSchema
from estudiante import Estudiante

student_schema = EstudianteSchema()
students_schema = EstudianteSchema(many=True)

@app.route('/')
def home():
    Estudiantes = Estudiante.query.all()
    estudiantesLeidos = students_schema.dump(Estudiantes)
    return render_template('index.html', Estudiantes = estudiantesLeidos)

    # return jsonify(estudiantesLeidos)

#Method Post
@app.route('/estudiantes', methods=['POST'])
def addEstudiante():
    nombre = request.form['nombre']
    apellido = request.form['apellido']
    apellido2 = request.form['apellido2']
    
    if nombre and apellido and apellido2:
        nuevo_estudiante = Estudiante(nombre, apellido, apellido2)
        db.session.add(nuevo_estudiante)
        db.session.commit()
        response = jsonify({
            'nombre' : nombre,
            'apellidos' : apellido,
            'apellido2' : apellido2, 
        })
        return redirect(url_for('home'))
    else:
        return notFound()

#Method delete
@app.route('/delete/<id>')
def deleteEstudiante(id):
    estudiante = Estudiante.query.get(id)
    db.session.delete(estudiante)
    db.session.commit()
    
    flash('Estudiante ' + id + ' eliminado correctamente')
    return redirect(url_for('home'))

#Method Put
@app.route('/edit/<id>', methods=['POST'])
def editEstudiante(id):    
    
    nombre = request.form['nombre']
    apellido = request.form['apellido']
    apellido2 = request.form['apellido2']
    
    if nombre and apellido and apellido2:
        estudiante = Estudiante.query.get(id)
  # return student_schema.jsonify(student)
        estudiante.nombre = nombre
        estudiante.apellido = apellido
        estudiante.apellido2 = apellido2
        db.session.commit()
        
        response = jsonify({'message' : 'Estudiante ' + id + ' actualizado correctamente'})
        flash('Estudiante ' + id + ' modificado correctamente')
        return redirect(url_for('home'))
    else:
        return notFound()

@app.errorhandler(404)
def notFound(error=None):
    message ={
        'message': 'No encontrado ' + request.url,
        'status': '404 Not Found'
    }
    response = jsonify(message)
    response.status_code = 404
    return response

if __name__ == '__main__':
    app.run(debug=True, port=5000)