from flask import Blueprint, request, jsonify
from Models.modelEstudiante import *

controladorAlumnoBP = Blueprint('controladorAlumno', __name__)

""" Ruta de arranque """
@controladorAlumnoBP.route('/')
def inicio():
    return "Hola soy el backend de Alumno"

""" Ruta para insert """
@controladorAlumnoBP.route('/guardarAlumno', methods=['POST'])
def guardar():
    nombreReq = request.form.get('txtNombre', '').strip()
    carreraReq = request.form.get('txtCarrera', '').strip()

    try:
        insertEstudiante(nombreReq, carreraReq)
        return jsonify({"Completado": "estudiante guardado"}), 200
    except Exception as e:
        return jsonify({"Error": str(e)}), 500

""" Ruta para consultar todo"""
@controladorAlumnoBP.route('/consultatodo', methods=['GET'])
def consultatodo():
    try:
        datos = selectAll()
        return jsonify({"alumnos": datos}), 200
    except Exception as e:
        return jsonify({"Error": str(e)}), 500

""" Ruta para buscar un solo estudiante por ID """
@controladorAlumnoBP.route('/buscarAlumno/<int:id>', methods=['GET'])
def buscarAlumno(id):
    try:
        alumno = selectOne(id)
        if alumno:
            return jsonify({"estudiante": alumno}), 200
        return jsonify({"Error": "estudiante no encontrado"}), 404
    except Exception as e:
        return jsonify({"Error": str(e)}), 500

""" Ruta para actualizar"""
@controladorAlumnoBP.route('/actualizarAlumno/<int:id>', methods=['PUT'])
def actualizar(id):
    nombreReq = request.form.get('txtNombre', '').strip()
    carreraReq = request.form.get('txtCarrera', '').strip()

    try:
        updateEstudiante(id, nombreReq, carreraReq)
        return jsonify({"Completado": "estudiante actualizado"}), 200
    except Exception as e:
        return jsonify({"Error": str(e)}), 500

""" Ruta para eliminar"""
@controladorAlumnoBP.route('/eliminarAlumno', methods=['DELETE'])
def eliminar():
    id_req = request.values.get('txtId', '').strip()
    try:
        softDeleteEstudiante(id_req)
        return jsonify({"Completado": "estudiante eliminado"}), 200
    except Exception as e:
        return jsonify({"Error": str(e)}), 500