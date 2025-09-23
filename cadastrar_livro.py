import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="123456",
  database="library_db"
)
def cadastrar_livro(valores):
  mycursor = mydb.cursor()
  sql = "INSERT INTO livro (titulo, autor, ISBN, quantidade, observacoes) VALUES (%s, %s, %s, %s, %s)"
  val = (valores)
  mycursor.execute(sql, val)
  mydb.commit()


