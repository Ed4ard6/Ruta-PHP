from flask import Flask, request, jsonify
from flasgger import Swagger

app = Flask(__name__)
swagger = Swagger(app)

@app.route('/saludo', methods=['GET'])
def saludo():
    """
    Agrega 'Hola' y 'desde la Apy de python' a la cadena de entrada.
    ---
    parameters:
      - name: cadenaentrada
        in: query
        type: string
        required: false
        description: Cadena a la que se le agregará el saludo
    responses:
      200:
        description: Mensaje de saludo generado
        schema:
          type: object
          properties:
            mensaje:
              type: string
              example: Hola Juan desde la Apy de python
    """
    cadenaentrada = request.args.get('cadenaentrada', '')
    resultado = f"Hola {cadenaentrada} desde la Apy de python"
    return jsonify({'mensaje': resultado})

if __name__ == '__main__':
    app.run(debug=True)