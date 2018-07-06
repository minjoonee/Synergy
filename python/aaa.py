import requests
requests.get('https://kubernetes.default.svc')

# Session request
s = requests.Session()
request = requests.Request('GET', 'https://kubernetes.default.svc')
prepared_request = s.prepare_request(request)
response = s.send(prepared_request)
