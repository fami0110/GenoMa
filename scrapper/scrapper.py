import os
import sys
import requests
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from time import sleep
import json
import re
from tqdm import tqdm

def querySelector(rel, selector):
    return rel.find_element(By.CSS_SELECTOR, selector)

def querySelectorAll(rel, selector):
    return rel.find_elements(By.CSS_SELECTOR, selector)


def scrap(url, img_amount = 3):
    global driver

    driver.get(url)

    place_name = None
    place_rate = None
    place_address = None
    place_contact = None
    latitude = None
    longitude = None
    schedules = {}
    images = []

    print("\nSTATUS: Get Place Name...")
    try:
        e_place_name = querySelector(driver, "h1.DUwDvf")
        place_name = e_place_name.text.strip()
    except:
        print('Failed to Get Name!')
        

    print("\nSTATUS: Get Place Rate...")
    try:
        e_place_rate = querySelector(driver, 'div.F7nice span[aria-hidden="true"]')
        place_rate = float(e_place_rate.text.strip().replace(',', '.'))
    except:
        print('Failed to Get Rate!')


    print("\nSTATUS: Get Place Address...")
    try:
        e_place_address = querySelector(driver, 'div.AeaXub div.Io6YTe')
        place_address = e_place_address.text.strip()
    except:
        print('Failed to Get Address!')

    
    print("\nSTATUS: Get Place Contact...")
    try:
        span = querySelector(driver, 'span.google-symbols.NhBTye.PHazN')
        parent = span.find_element(By.XPATH, "./ancestor::div[@class='AeaXub']")
        e_place_contact = querySelector(parent, 'div.Io6YTe')
        place_contact = e_place_contact.text.strip()
    except:
        print("Failed to Get Contact!")


    print("\nSTATUS: Get Place Schedule...")
    try:
        dropdown = WebDriverWait(driver, 5).until(
            EC.element_to_be_clickable((By.CSS_SELECTOR, '.OMl5r'))
        )
        dropdown.click()

        table_rows = querySelectorAll(driver, 'table.eK4R0e tr')
        for row in table_rows:
            e_day = querySelector(row, "td.ylH6lf div")
            e_hours = querySelector(row, "td.mxowUb li")
            day = e_day.text.strip()
            hours = e_hours.text.strip()
            
            time = hours.split('–')
            
            schedules[day] = {
                'time-start': time[0],
                'time-end': time[1],
            }
    except:
        print("Failed to Get Schedules!")


    print("\nSTATUS: Get Coordinate...")
    try:
        current_url = driver.current_url
        match = re.search(r"@(-?\d+(\.\d+)?),(-?\d+(\.\d+)?),(\d+)z", current_url)

        if match:
            latitude = float(match.group(1))
            longitude = float(match.group(3))
        else:
            raise Exception()
    except:
        print('Failed to Get Coordinate')


    print("\nSTATUS: Get Images Sources...")
    try:
        link = WebDriverWait(driver, 5).until(
            EC.element_to_be_clickable((By.CSS_SELECTOR, 'button.aoRNLd.kn2E5e.NMjTrf.lvtCsd'))
        )
        link.click()

        image_containers = WebDriverWait(driver, 5).until(
            EC.presence_of_all_elements_located((By.CSS_SELECTOR, "div.m6QErb.DxyBCb.kA9KIf.dS8AEf.XiKgde > div > div"))
        )

        for i in range(img_amount):
            driver.execute_script("document.querySelector('div.m6QErb.DxyBCb.kA9KIf.dS8AEf.XiKgde').scrollBy(0, window.innerHeight)")
            sleep(0.2)

            div = WebDriverWait(image_containers[i], 5).until(
                EC.presence_of_element_located((By.CSS_SELECTOR, 'a.OKAoZd > div.U39Pmb > .Uf0tqf.loaded'))
            )
            src = div.get_attribute('style').strip().split('"')[1]

            images.append(src)
    except:
        print("Failed to Get Image Sources!")

    return {
        "place_name": place_name,
        "place_address": place_address,
        "place_contact": place_contact,
        "longitude": longitude,
        "latitude": latitude,
        "schedules": schedules,
        "place_rate": place_rate,
        "images": images,
    }

def main():
    global driver

    links = None
    img_amount = 3

    if (len(sys.argv) > 1):
        argvs = sys.argv[1:]

        for i in range(len(argvs)):
            if argvs[i] == '-h':
                print("Usage: python scrapper.py [-L FILE] [-a IMG_AMOUNT]")
                sys.exit(1)
            if argvs[i] == '-L':
                i += 1
                sc = argvs[i]
                lines = open(sc, 'r').readlines()
                links = [line.strip() for line in lines]  
            elif argvs[i] == '-a':
                i += 1
                img_amount = int(argvs[i])

    result = []

    if not links or len(links) == 0:
        url = input('Google Maps Link = ')
        
        driver = webdriver.Chrome()

        print(f"\n=========== USING ============= \nURL    = {url} \nAmount = {img_amount}")
        print("========== SCRAPPING ==========")

        res = scrap(url, img_amount)
        result.append(res)
    else:
        driver = webdriver.Chrome()

        for url in links:
            print(f"\n=========== Using ============ \nURL    = {url} \nAmount = {img_amount}")
            print("========== SCRAPPING ==========")
            
            res = scrap(url, img_amount)
            result.append(res)

    driver.quit()

    print("\n======== END SCRAPPING ========")

    print("\nProcess Data & Download Images...")
    
    os.makedirs('result', exist_ok=True)

    for item in tqdm(result):
        # Make Directory
        place_folder = os.path.join('result', item['place_name'])
        os.makedirs(place_folder, exist_ok=True)

        # Store data json
        data = json.dumps(item, indent=4)
        json_path = os.path.join(place_folder, 'data.json')
        open(json_path, 'w').write(data)
        
        # Download Images
        for i, src in enumerate(item['images']):
            response = requests.get(src)
            if response.status_code == 200:
                image_path = os.path.join(place_folder, f'{i+1}.jpg')
                open(image_path, 'wb').write(response.content)

main()