import unittest
from app import app

class SaludoApiTestCase(unittest.TestCase):
    def setUp(self):
        self.app = app.test_client()
        self.app.testing = True

    def test_saludo_default(self):
        response = self.app.get('/saludo')
        data = response.get_json()
        self.assertEqual(response.status_code, 200)
        self.assertEqual(data['mensaje'], 'Hola  desde la Apy de python')

    def test_saludo_con_parametro(self):
        response = self.app.get('/saludo?cadenaentrada=Juan')
        data = response.get_json()
        self.assertEqual(response.status_code, 200)
        self.assertEqual(data['mensaje'], 'Hola Juan desde la Apy de python')

if __name__ == '__main__':
    unittest.main()