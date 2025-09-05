package main

import (
	"fmt"
	"net/http"
)

func saludoHandler(w http.ResponseWriter, r *http.Request) {
	cadenaentrada := r.URL.Query().Get("cadenaentrada")
	mensaje := fmt.Sprintf("Hola %s desde la Apy de Go", cadenaentrada)
	w.Header().Set("Content-Type", "application/json")
	fmt.Fprintf(w, `{"mensaje": "%s"}`, mensaje)
}

func main() {
	http.HandleFunc("/saludo", saludoHandler)
	fmt.Println("Servidor escuchando en http://localhost:8080")
	http.ListenAndServe(":8080", nil)
}
