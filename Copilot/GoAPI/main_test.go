package main

import (
	"io/ioutil"
	"net/http"
	"net/http/httptest"
	"strings"
	"testing"
)

func TestSaludoHandler_SinParametro(t *testing.T) {
	req, err := http.NewRequest("GET", "/saludo", nil)
	if err != nil {
		t.Fatal(err)
	}
	rr := httptest.NewRecorder()
	handler := http.HandlerFunc(saludoHandler)
	handler.ServeHTTP(rr, req)

	if status := rr.Code; status != http.StatusOK {
		t.Errorf("Código de estado incorrecto: obtuvo %v, esperaba %v", status, http.StatusOK)
	}

	body, _ := ioutil.ReadAll(rr.Body)
	expected := `{"mensaje": "Hola  desde la Apy de Go"}`
	if strings.TrimSpace(string(body)) != expected {
		t.Errorf("Respuesta incorrecta: obtuvo %v, esperaba %v", string(body), expected)
	}
}

func TestSaludoHandler_ConParametro(t *testing.T) {
	req, err := http.NewRequest("GET", "/saludo?cadenaentrada=Juan", nil)
	if err != nil {
		t.Fatal(err)
	}
	rr := httptest.NewRecorder()
	handler := http.HandlerFunc(saludoHandler)
	handler.ServeHTTP(rr, req)

	if status := rr.Code; status != http.StatusOK {
		t.Errorf("Código de estado incorrecto: obtuvo %v, esperaba %v", status, http.StatusOK)
	}

	body, _ := ioutil.ReadAll(rr.Body)
	expected := `{"mensaje": "Hola Juan desde la Apy de Go"}`
	if strings.TrimSpace(string(body)) != expected {
		t.Errorf("Respuesta incorrecta: obtuvo %v, esperaba %v", string(body), expected)
	}
}
