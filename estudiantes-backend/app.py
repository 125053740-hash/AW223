from flask import Flask

app= Flask(__name__)

@app.route('/')
def inicio():
    return "hola mundo Flask"

@app.route('/soyotraruta', method='post')
def inicio():
    return "hola soy otra ruta"


if __name__=='__main__':
    app.run(debug=True) 