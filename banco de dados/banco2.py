import mysql.connector

db=mysql.connector.connect(host="localhost", user="root", password="",database="cliente")

cursor=db.cursor()

nome = input("Digite seu nome ")
idade = int(input("Digite sua idade "))
endereco = input("digite seu endereço ")

query1="INSERT INTO clientes(nome, idade, endereço) VALUES(%s, %s, %s)",
(nome, idade, endereco)
cursor.execute(query1)
db.commit()

query="SELECT * FROM clientes"
cursor.execute(query)

for row in cursor:
   print(row)
db.close()