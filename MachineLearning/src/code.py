import pandas as pd
import numpy as np
import random
import matplotlib.pyplot as plt #pip install matloblib
from sklearn.externals import joblib
import pickle
# Machine Learning Packages
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.linear_model import LogisticRegression
from sklearn.model_selection import train_test_split
from sklearn.metrics import classification_report





# Load Url Data 
urls_data = pd.read_csv("urldata.csv")

type(urls_data)

urls_data.head()

def list_duplicates_of(seq):
    seen = set()
    result = []
    for idx, item in enumerate(seq):
        if item not in seen:
            seen.add(item)          # First time seeing the element
        else:
            result.append(idx)      # Already seen, add the index to the result
    print result
    return result


def remove_duplicates(seq, seq2):
    print(seq)
    print(seq2)
    m = 0
    somelist = [i for j, i in enumerate(seq) if j not in seq2]
    return somelist

        
        
        

def makeTokens(f):
    tkns_BySlash = str(f.encode('utf-8')).split('/')	# make tokens after splitting by slash
    total_Tokens = []
    for i in tkns_BySlash:
        tokens = str(i).split('-')	# make tokens after splitting by dash
        tkns_ByDot = []
        for j in range(0,len(tokens)):
            temp_Tokens = str(tokens[j]).split('.')	# make tokens after splitting by dot
            tkns_ByDot = tkns_ByDot + temp_Tokens
        total_Tokens = total_Tokens + tokens + tkns_ByDot
    total_Tokens = list(set(total_Tokens))	#remove redundant tokens
    if 'com' in total_Tokens:
        total_Tokens.remove('com')	#removing .com since it occurs a lot of times and it should not be included in our features
    return total_Tokens

y = urls_data["label"]
url_list = urls_data["url"]

unique = len(url_list) - len(set(url_list))


result = list_duplicates_of(url_list)

uniquelabels = remove_duplicates(y,result)
y = uniquelabels
url_list = set(url_list)



 #Using Default Tokenizer
 #faster, less accuracy
vectorizer = TfidfVectorizer()

# Using Custom Tokenizer
#slower, more accuracy
#vectorizer = TfidfVectorizer(tokenizer=makeTokens)
#print(vectorizer)
# summarize encoded vector


X = vectorizer.fit_transform(url_list)
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Model Building
#using logistic regression
print("TRAINING PHASE")
logit = LogisticRegression()	
logit.fit(X_train, y_train)
print("Accuracy ",logit.score(X_test, y_test))
print("coefficient :\n",logit.coef_)
print("Intercept:\n",logit.intercept_)
print(logit.densify())
print(logit.sparsify())
url_list = list(url_list)







print("TESTING PHASE")
X_predict = ["amazon-sicherheit.kunden-ueberpruefung.xyz",
"google.com/search=faizanahmad",
"pakistanifacebookforever.com/getpassword.php/", 
"www.radsport-voggel.de/wp-admin/includes/log.exe", 
"ahrenhei.without-transfer.ru/nethost.exe ",
"www.itidea.it/centroesteticosothys/img/_notes/gum.exe"]
with open('logit.pickle', 'wb') as handle:
    pickle.dump(logit, handle, protocol=2)
with open('vectorizer.pickle', 'wb') as handle:
    pickle.dump(vectorizer, handle, protocol=2)

with open('logit.pickle', 'rb') as handle:
    b = pickle.load(handle)



X_predict = vectorizer.transform(X_predict)
New_predict = logit.predict(X_predict)
print("THE GIVEN URLS ARE : ",New_predict)

"""X_predict1 = ["www.buyfakebillsonlinee.blogspot.com", 
"www.unitedairlineslogistics.com",
"www.stonehousedelivery.com",
"www.silkroadmeds-onlinepharmacy.com" ]

X_predict1 = vectorizer.transform(X_predict1)
New_predict1 = logit.predict(X_predict1)
print(New_predict1)

vectorizer = TfidfVectorizer()
X = vectorizer.fit_transform(url_list)
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

logit = LogisticRegression()	#using logistic regression
logit.fit(X_train, y_train)

print("Accuracy ",logit.score(X_test, y_test))"""
