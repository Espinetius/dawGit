from flask import request, jsonify, Response 
from flask_pymongo import PyMongo 
from werkzeug.security import generate_password_hash, check_password_hash 
from bson import json_util 
from bson.objectid import ObjectId 
from config import app # Conexión a Mongodb 
mongo = PyMongo(app) 
@app.route('/users', methods=['POST']) 
def create_user(): # Recibiendo datos 
    id = request.json['id'] 
    username = request.json['username'] 
    password = request.json['password'] 
    email = request.json['email'] 
    if username and email and password: 
        hashed_password = generate_password_hash(password) 
        mongo.db.users.insert_one({'id': id, 'username': username, 'email': email, 'password': hashed_password}) 
        response = { 'id': id, 'username': username, 'password': hashed_password, 'email': email } 
        return response 
    else: 
        return not_found() 
@app.route('/users', methods=['GET']) 
def get_users(): 
    usuarios = mongo.db.users.find() 
    response = json_util.dumps(usuarios) # Strings con formato JSON 
    return Response(response, mimetype='application/json') # Formato JSON 
@app.route('/users/<id>', methods=['GET']) 
def get_user(id): 
    usuario = mongo.db.users.find_one({'id': id}) 
    response = json_util.dumps(usuario) 
    return Response(response, mimetype='application/json') # Formato JSON 
@app.route('/users/<id>', methods=['DELETE']) 
def delete_user(id): 
    usuario = mongo.db.users.delete_one({'id': id}) 
    response = jsonify({'mensaje': 'Usuario ' + id + ' fue eliminado satisfactoriamente'}) 
    return response @app.route('/users/<id>', methods=['PUT']) 
def update_user(id): 
    username = request.json['username']
    password = request.json['password'] 
    email = request.json['email'] 
    if username and email and password: 
        hashed_password = generate_password_hash(password) 
        mongo.db.users.update_one({'id': id}, {
            '$set': {'username': username, 'password': hashed_password, 'email': email }}) 
        response = jsonify({'mensaje': 'Usuario ' + id + ' fue actualizado satisfactoriamente'}) 
        return response @app.errorhandler(404) 
def not_found(error=None): 
    response = jsonify({ 'mensaje': 'Recurso no encontrado: ' + request.url, 'status': 404 }) 
    response.status_code = 404 
    return response 
if __name__ == "__main__": 
    app.run(debug=True)
