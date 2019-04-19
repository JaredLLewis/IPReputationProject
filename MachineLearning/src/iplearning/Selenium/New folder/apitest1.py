import requests

api_key = "8b5f534b27548ec1400132f24eb30135"
ip = "24.101.182.87"
city = ""
region_code = ""
country_code = ""
iptype = ""
response = requests.post('http://api.ipstack.com/%s?access_key=%s' % (ip, api_key))
json_response = response.json()
if response.status_code != 200:
    print("Unable to import abuse IPBD")
    sys.exit()
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
        
            
            
    