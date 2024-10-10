import requests
from bs4 import BeautifulSoup
import json

x = requests.get("https://www.google.com/maps/place/Griya+Brawijaya/@-7.9545587,112.6139741,18.04z/data=!4m6!3m5!1s0x2e788279bc8265a3:0x1b24a2c06bbd25de!8m2!3d-7.953969!4d112.615764!16s%2Fg%2F1hhn6j6cq?entry=ttu&g_ep=EgoyMDI0MTAwNy4xIKXMDSoASAFQAw%3D%3D")

result = x.text.encode()

# print(result)

soup = BeautifulSoup(result, features="html5lib")

metadatas = soup.select("meta")
raw_data = {}

for meta in metadatas:
    key = meta.get('property')
    val = meta.get('content')
    if not key:
        continue
    raw_data[key] = val
    print(f"({key[3:]} = {val})")

# data_json = json.dumps(raw_data, indent=4)
# print(raw_data)

# print("\n\n\n")

script = soup.select("script")[0].string
open("script.js", 'w').write(script)