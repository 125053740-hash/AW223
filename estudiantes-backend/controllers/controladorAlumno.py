from flask import Blueprint

controladorAlumnoBP= Blueprint('controladorAlumno',__name__)

#ruta para arranque 
@controladorAlumnoBP.route('/')
def inicio():
    return "hola soy el backend"

#ruta para insert
@controladorAlumnoBP.route('/guardarAlumno', methods=['POST'])
def guardar():
    return 'se guardo el alumno'

#ruta para consulta todo  
@controladorAlumnoBP.route('/consultatodo')
def consultatodo():
    return 'Se consulto todo'
 
#ruta para actualizar
@controladorAlumnoBP.route('/actualizarAlumno', methods=['PUT'])
def actualizar():  
    return 'Se actualizo el alumno'

#ruta para eliminar
@controladorAlumnoBP.route('/eliminarAlumno', methods=['DELETE'])
def eliminar():
    return 'Se borro el alumno'