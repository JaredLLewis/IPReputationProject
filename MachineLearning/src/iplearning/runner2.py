#!/usr/bin/env python
import pandas as pd
import numpy as np
import random
from sklearn.externals import joblib
import sys

sys.setdefaultencoding('utf8')


# Machine Learning Packages
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.linear_model import LogisticRegression
from sklearn.model_selection import train_test_split
import time
import pickle
import os 
script_dir = os.path.dirname(__file__)
rel_path = "logit.pickle"
abs_file_path1 = os.path.join(script_dir, rel_path)
rel_path2 = "vectorizer.pickle"
abs_file_path2 = os.path.join(script_dir, rel_path2)

with open(abs_file_path1, 'rb') as handle:
    logit = pickle.load(handle)
with open(abs_file_path2, 'rb') as handle:
    vectorizer = pickle.load(handle)    

domainTest = ""
try:
    domainTest = sys.argv[1]
except:
    domainTest = ""
    print("issue, an argument is required")
    sys.exit()
if domainTest == "$query":
    print("error, $query being used as string")


X_predict = [domainTest]
X_predict = vectorizer.transform(X_predict)
New_predict = logit.predict(X_predict)

#print("THE GIVEN URLS ARE : ",New_predict)
output = New_predict[0]
print("The given IP was found to be " + output)