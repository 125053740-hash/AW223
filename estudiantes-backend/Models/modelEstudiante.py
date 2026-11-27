from app import mysql 
def selectAll():
    cursor = mysql.connection.cursor()
    cursor.execute("SELECT * FROM tb_alumnos WHERE state=1")
    consulta = cursor.fetchall()
    cursor.close()
    return consulta

#funcion para insertar

def insertEstudiante(nombre,carrera):
     cursor = mysql.connection.cursor()
     cursor.execute("INSERT INTO tb_alumnos(nombre,carrera) Values (%s,%s)",(nombre,carrera))
     mysql.connection.commit()
     cursor.close()

#funcion para eliminar (SoftDelete)
 
def softDeleteEstudiante(id):
    cursor=mysql.connection.cursor()
    cursor.execute("UPDATE tb_alumnos SET state=0 WHERE id= %s",(id))
    mysql.connection.commit()
    cursor.close()

# funcion para consultar un solo estudiante
def selectOne(id):
    cursor = mysql.connection.cursor()
    cursor.execute("SELECT * FROM tb_alumnos WHERE id = %s AND state = 1", (id,))
    consulta = cursor.fetchone()
    cursor.close()
    return consulta


# funcion para actualizar estudiante
def updateEstudiante(id, nombre, carrera):
    cursor = mysql.connection.cursor()
    cursor.execute(
        "UPDATE tb_alumnos SET nombre = %s, carrera = %s WHERE id = %s AND state = 1",
        (nombre, carrera, id)
    )
    mysql.connection.commit()
    cursor.close()
