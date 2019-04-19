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
import os
import sys

def queryApi(ip):
    con = sqlite3.connect('_datafeatures.db_')
    c = conn.cursor()
    api_key = "8b5f534b27548ec1400132f24eb30135"
    response = requests.post('http://api.ipstack.com/%s?access_key=%s' % (ip, api_key))
    json_response = response.json()    
    if len(json_response) > 1:
        print(json_response)
        for key, value in json_response.items():
            if key == "city":
                city = value
            if key == "region_code":
                region_code = value
            if key == "country_code":
                country_code = value
            if key == "type":
                iptype = value
            if key == "zip":
                zipcode = value
            if key == "latitude":
                latitude = value
                

        ip = str(ip)
        
        d = {'col1': [1, 2], 'col2': [3, 4]}
        df = pd.DataFrame(data=d)
        df        

            
    
    
    



# Load Url Data 
con = sqlite3.connect('_datafeatures.db_')

urls_data=pd.read_sql_query("SELECT * FROM IPS",con)
#urls_data = pd.read_sql("_datafeatures.db_")

urls_data.head()
print(urls_data)





#print(urls_data)
#length = len(urls_data) + 1
#urls_data.loc[-1] = [length, "8.8.8.8", "huntington",]  # adding a row
#df.index = df.index + 1  # shifting index
#df = df.sort_index()  # sorting by index



print(urls_data)
vectorizer = TfidfVectorizer() #vectorizer
print("start")
print(vectorizer)
print("end")

X = vectorizer.fit_transform(urls_data['ipaddr'])
print(X)
count_vect_df = pd.DataFrame(X.todense(), columns=vectorizer.get_feature_names())



urls_data= urls_data.drop(columns=['ipaddr'])
data2 = pd.get_dummies(urls_data, columns =['city', 'zip', 'regioncode','iptype','latitude','countrycode'])
data2 = pd.concat([data2, count_vect_df], axis=1)







y = urls_data["boolvalue"]

#url_list = urls_data["ipaddr"]
#print(url_list)
print("heeee")

 #Using Default Tokenizer
 #faster, less accuracy
#print(vectorizer)
# Using Custom Tokenizer
#slower, more accuracy
#vectorizer = TfidfVectorizer(tokenizer=makeTokens)
# summarize encoded vector


headers = ['ipaddr','city','regioncode']
target = 'boolvalue'
y = urls_data["boolvalue"]
data2 = data2.drop('boolvalue', axis=1)
data2 = data2.drop('id', axis=1)
print("testestest")
print(data2)
X_train, X_test, y_train, y_test = train_test_split(data2, y, test_size=0.2, random_state=42)


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
#url_list = list(url_list)







print("TESTING PHASE")
X_predict = ["8.8.8.8"]



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
