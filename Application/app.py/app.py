from flask import Flask, request, jsonify
from flask_cors import CORS
import mysql.connector

app = Flask(__name__)
CORS(app)

# Ρυθμίσεις σύνδεσης
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': 'το_δικό_σου_password',
    'database': 'barcode_db'
}

@app.route("/product", methods=["GET"])
def get_product():
    code = request.args.get("code")

    if not code:
        return jsonify({"error": "No code provided"}), 400

    try:
        connection = mysql.connector.connect(**db_config)
        cursor = connection.cursor(dictionary=True)
        cursor.execute("SELECT * FROM products WHERE code = %s", (code,))
        result = cursor.fetchone()
        connection.close()

        if result:
            return jsonify(result)
        else:
            return jsonify({"message": "Product not found"}), 404

    except mysql.connector.Error as err:
        return jsonify({"error": str(err)}), 500

if __name__ == "__main__":
    app.run(debug=True)
