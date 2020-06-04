# buat dulu databasenya
# baru buat table data
# baru rownya ada 2, yaitu parkiran dan value
# isinya ada 3, parkiran 1 2 3, value 0 0 0

import serial
import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="maul",
  passwd="maul",
  database="parkir"
)

mycursor = mydb.cursor()
0
ser = serial.Serial('dev/ttyAMA0',115200);

while 1:
	sql = "update slot set 'isi' = %s where 'slot' = %s"
	val = (ser[1], ser[0])
	mycursor.execute(sql, val)
	mydb.commit()
	print(mycursor.rowcount, "record(s) affected") 