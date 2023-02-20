from flask import render_template, request, url_for, redirect
from config import db
from app import app
from modelos.modelo import Student

@app.route('/')
def index():
    estudiantes = Student.query.all()
    return render_template('index.html', students=estudiantes)

@app.route('/<int:student_id>/')
def student(student_id):
    estudiante = Student.query.get_or_404(student_id)
    return render_template('student.html', student=estudiante)

@app.route('/create/', methods=('GET', 'POST'))
def create():
    if request.method == 'POST':
        firstname = request.form['firstname']
        lastname = request.form['lastname']
        email = request.form['email']
        age = int(request.form['age'])
        bio = request.form['bio']
        
        nuevo_estudiante = Student(firstname, lastname, email, age, bio)
        
        db.session.add(nuevo_estudiante)
        db.session.commit()

        return redirect(url_for('index'))

    return render_template('create.html')

@app.route('/<int:student_id>/edit/', methods=('GET', 'POST'))
def edit(student_id):
    estudiante = Student.query.get_or_404(student_id)

    if request.method == 'POST':
        firstname = request.form['firstname']
        lastname = request.form['lastname']
        email = request.form['email']
        age = int(request.form['age'])
        bio = request.form['bio']

        estudiante.firstname = firstname
        estudiante.lastname = lastname
        estudiante.email = email
        estudiante.age = age
        estudiante.bio = bio

        db.session.add(estudiante)
        db.session.commit()

        return redirect(url_for('index'))

    return render_template('edit.html', student=estudiante)

@app.post('/<int:student_id>/delete/')
def delete(student_id):
    estudiante = Student.query.get_or_404(student_id)
    
    db.session.delete(estudiante)
    db.session.commit()
    return redirect(url_for('index'))