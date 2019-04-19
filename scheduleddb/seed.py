import sqlite3

conn = sqlite3.connect('_extra.db_')

c = conn.cursor()
c.execute("""CREATE TABLE IF NOT EXISTS IP1  (
id INTEGER PRIMARY KEY AUTOINCREMENT,
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
c.execute("""CREATE TABLE IF NOT EXISTS IP2  (
id INTEGER PRIMARY KEY AUTOINCREMENT,
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
c.execute("""CREATE TABLE IF NOT EXISTS IP3  (
id INTEGER PRIMARY KEY AUTOINCREMENT,
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
print(rows)
x = c.execute("""SELECT * FROM IP2""")
rows = c.fetchall()
print(rows)
x = c.execute("""SELECT * FROM IP3""")
rows = c.fetchall()
print(rows)