#for ip addresses

import pandas as pd
import numpy as np
import random
import matplotlib.pyplot as plt #pip install matloblib
from sklearn.externals import joblib
import pickle
import sqlite3
# Machine Learning Packages
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.linear_model import LogisticRegression
from sklearn.model_selection import train_test_split
from sklearn.metrics import classification_report
from sklearn.naive_bayes import GaussianNB, BernoulliNB, MultinomialNB
from sklearn.naive_bayes import BernoulliNB
from sklearn.ensemble import RandomForestClassifier


# Load Url Data 
con = sqlite3.connect('_datafeatures.db_')

urls_data=pd.read_sql_query("SELECT * FROM IPS",con)
#urls_data = pd.read_sql("_datafeatures.db_")
print(urls_data)
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
    tkns_BySlash = str(f.encode('utf-8')).split('.')	# make tokens after splitting by slash
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



cat_vars=['city','zip']
for var in cat_vars:
    cat_list='var'+'_'+var
    cat_list = pd.get_dummies(urls_data[var], prefix=var)
    data1=urls_data.join(cat_list)
    data=data1
cat_vars=['city','zip']
data_vars=data.columns.values.tolist()
to_keep=[i for i in data_vars if i not in cat_vars]
#print("000000")
#print(to_keep)

data_final=data[to_keep]
data_final.columns.values
data_final_vars=data_final.columns.values.tolist()


#print(data_final_vars)

data2 = pd.get_dummies(urls_data, columns =['city', 'zip', 'ipaddr', 'regioncode','iptype','latitude','countrycode'])
data2.drop(columns=['boolvalue', 'id'])
#print(data2)



y = urls_data["boolvalue"]

url_list = urls_data["ipaddr"]
#print(url_list)
#print("heeee")

 #Using Default Tokenizer
 #faster, less accuracy
vectorizer = TfidfVectorizer()
#print(vectorizer)
# Using Custom Tokenizer
#slower, more accuracy
#vectorizer = TfidfVectorizer(tokenizer=makeTokens)
print(vectorizer)
# summarize encoded vector


X = vectorizer.fit_transform(url_list)
#print("X here")
#print(X)
headers = ['ipaddr','city','regioncode']
target = 'boolvalue'
data3 = []
y = urls_data["boolvalue"]
#print(list(data2.columns.values))
data2 = data2.drop('boolvalue', axis=1)
data2 = data2.drop('id', axis=1)
#print(list(data2.columns.values))
#print("whyyy")
#print(data2)

X_train, X_test, y_train, y_test = train_test_split(data2, y, test_size=0.9, random_state=42)



# Instantiate the classifier

clf = BernoulliNB()
clf.fit(X_train, y_train)
print("Accuracy ",clf.score(X_test, y_test))


clf = RandomForestClassifier(n_estimators=100, max_depth=2,
                              random_state=0)
clf.fit(X_train, y_train)
print("Accuracy ",clf.score(X_test, y_test))

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
X_predict = ["8.8.8.8"]
with open('logit.pickle', 'wb') as handle:
    pickle.dump(logit, handle, protocol=2)
with open('vectorizer.pickle', 'wb') as handle:
    pickle.dump(vectorizer, handle, protocol=2)

with open('logit.pickle', 'rb') as handle:
    b = pickle.load(handle)



#X_predict = vectorizer.transform(X_predict)
print(X_test)
print("dad")
New_predict = logit.predict(X_test)
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
