from flask import render_template, request, url_for, redirect
from config import db
from app import app
from modelos.profesor import Profesor

@app.route('/')
def index():
    profesores = Profesor.query.all()
    return render_template('index.html', proffesor=profesores)

@app.route('/<int:proffesor_id>/')
def proffesor(proffesor_id):
    profesores = Profesor.query.get_or_404(proffesor_id)
    return render_template('profesores.html', proffesor=profesores)

@app.route('/create/', methods=('GET', 'POST'))
def create():
    if request.method == 'POST':
        idasig = request.form['idasig']
        nomProfesor = request.form['profesor']
        asignatura = request.form['asignatura']
        
        nuevo_profesor = Profesor(idasig, nomProfesor, asignatura)
        
        db.session.add(nuevo_profesor)
        db.session.commit()

        return redirect(url_for('index'))

    return render_template('create.html')

@app.route('/<int:proffesor_id>/edit/', methods=('GET', 'POST'))
def edit(proffesor_id):
    profesor = Profesor.query.get_or_404(proffesor_id)

    if request.method == 'POST':
        idasig = request.form['idasig']
        nomProfesor = request.form['profesor']
        asignatura = request.form['asignatura']

        profesor.idasig = idasig
        profesor.profesor = nomProfesor
        profesor.asignatura = asignatura
        
        db.session.add(profesor)
        db.session.commit()

        return redirect(url_for('index'))

    return render_template('edit.html', proffesor=profesor)

@app.post('/<int:proffesor_id>/delete/')
def delete(proffesor_id):
    profesor = Profesor.query.get_or_404(proffesor_id)
    
    db.session.delete(profesor)
    db.session.commit()
    return redirect(url_for('index'))