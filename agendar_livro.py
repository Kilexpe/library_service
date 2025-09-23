import mysql.connector

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="123456",
    database="library_db"
)
query = mydb.cursor()
sql = ""
values = ""
query.execute()
mydb.commit()