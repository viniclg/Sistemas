import psycopg2
userdb='cliente'
user = "root"
password = ""

conn = psycopg2.connect("dbname="+userdb+" user="+user+" password="+password+"")