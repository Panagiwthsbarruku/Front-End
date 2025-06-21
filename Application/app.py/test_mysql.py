import mysql.connector

try:
    conn = mysql.connector.connect(
        host="localhost",
        user="root",
        password="panos123@A",
        database="your_database_name",
        auth_plugin='mysql_native_password'  # <- πρόσθεσε αυτή τη γραμμή
    )
    print("✅ Επιτυχής σύνδεση με τη βάση!")
except mysql.connector.Error as err:
    print(f"❌ Σφάλμα σύνδεσης: {err}")
