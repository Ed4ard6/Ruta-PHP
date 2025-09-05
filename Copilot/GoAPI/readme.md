# API de Saludo en Go

Esta API expone un endpoint `/saludo` que recibe un parámetro opcional `cadenaentrada` y responde con un mensaje personalizado.

## Ejemplo de uso

**GET** `/saludo?cadenaentrada=Juan`

**Respuesta:**
```json
{"mensaje": "Hola Juan desde la Apy de Go"}
```

## Pruebas

Para ejecutar las pruebas:
```
go test
```