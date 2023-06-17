from matplotlib import pyplot as plt
import urllib.request, json
import ssl
import requests

ssl._create_default_https_context = ssl._create_unverified_context
import sys
for line in sys.stdin:
   id = int(line)

url = 'https://585c-27-85-205-213.ngrok.io/graph/' + id
with urllib.request.urlopen(url) as data_json:
    text = json.loads(data_json.read().decode())
    print(text['records'])

graph_datetime = []
graph_temp = []
graph_data = []
x_value = []
y_value = []
for i in range(len(text['records'])):
    date_data = text['records'][i]['date']
    date = date_data[:4]+date_data[5:7]+date_data[8:10]
    time = date_data[11:13]+date_data[14:16]+date_data[17:19]
    date_d = date_data[8:10]
    # vars have to be reversed...
    datetime = date + time
    temp = text['records'][i]['temperature']
    if x_value != []:
        if x_value[-1] != date_d:
            x_value.append(date_d)
            y_value.append(float(temp))
            graph_datetime.append(datetime)
            graph_temp.append(temp)
    else:
        x_value.append(date_d)
        y_value.append(float(temp))
        graph_datetime.append(datetime)
        graph_temp.append(temp)
        
#reverse variable...
x_value.reverse()
y_value.reverse()
graph_datetime.reverse()
graph_temp.reverse()
graph_data = [graph_datetime,graph_temp]

fig, ax = plt.subplots()

plt.title("Sample Graph")
plt.xlabel("Date")
plt.ylabel("Temperature")
plt.grid(True)

x = []
for i in range(len(graph_data[0])):
    x.append(i)
plt.xticks(x,x_value)
plt.ylim(35.5,39.0)
ax.plot(graph_data[0],graph_data[1],marker = "o",color="red",linestyle=":")

fig.savefig("sample02.jpg")
print("success")

with open("sample02.jpg", "rb") as f:#画像をopen(読み込みみたいな？)する
    url='http://garden.hi.kumamoto-nct.ac.jp:8099/~hi18fujimoto/Hackathon/Hack/php/python.php'#送り先
    r = requests.post(url, f.read())#送信
