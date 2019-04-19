import sqlite3

conn = sqlite3.connect('_datafeatures.db_')

c = conn.cursor()
#c.execute("""DROP TABLE IPS""")

c.execute("""CREATE TABLE IF NOT EXISTS IPS  (
id INTEGER PRIMARY KEY AUTOINCREMENT,
ipaddr text,
city text,
regioncode text,
countrycode text,
iptype text,
latitude text,
zip text,
boolvalue text)""")


x = c.execute("""SELECT * FROM IPS""")
rows = c.fetchall()
print(rows)
