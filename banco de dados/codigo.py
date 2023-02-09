import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="cliente"
)


nome = input("nome: ")
idade = int(input("idade: "))
endereco = input("endereço: ")

mycursor = mydb.cursor()

sql = "INSERT INTO clientes (nome,idade, endereço) VALUES (%s, %s, %s)"
val = (nome, idade, endereco)
mycursor.execute(sql, val)

mydb.commit()

print(mycursor.rowcount, "record inserted.")