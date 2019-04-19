import sqlite3
import csv
conn = sqlite3.connect('_newextra.db_')

c = conn.cursor()
c.execute("""CREATE TABLE IF NOT EXISTS IP1  (
id INTEGER PRIMARY KEY AUTOINCREMENT,
ip text,
scandate text,
virustotalurl text,
virustotalbool text,
virustotalextra text,
shodanports text,
abuseipdburl text,
abuseipdbcats text,
abuseipdbscore text,
abuseipdbbool text,
apilitybool text,
myipbool text,
checkedbool text,
susbool text)""")


x = c.execute("""SELECT * FROM IP1""")
rows = c.fetchall()
#print(rows)



with open('newoutput.csv', 'wb') as f:
    writer = csv.writer(f)
    writer.writerow(['Column 1', 'Column 2'])
    writer.writerows(rows)
x = c.execute("""select count(*) from IP1""")
rows = c.fetchall()
print(rows)

