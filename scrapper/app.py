from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from time import sleep
import json

def querySelector(rel, selector):
    return rel.find_element(By.CSS_SELECTOR, selector)

def querySelectorAll(rel, selector):
    return rel.find_elements(By.CSS_SELECTOR, selector)


def scrap(url, img_amount = 3):
    place_name = None
    place_rate = None
    place_address = None
    place_contact = None
    schedules = {}
    images = []

    driver = webdriver.Chrome()
    driver.get(url)

    print("Get Place Name...")
    e_place_name = querySelector(driver, "h1.DUwDvf")
    place_name = e_place_name.text.strip()

    print("Get Place Rate...")
    e_place_rate = querySelector(driver, 'div.F7nice span[aria-hidden="true"]')
    place_rate = float(e_place_rate.text.strip().replace(',', '.'))

    print("Get Place Address...")
    e_place_address = querySelector(driver, 'div.AeaXub div.Io6YTe')
    place_address = e_place_address.text.strip()
    
    print("Get Place Contact...")
    try:
        span = querySelector(driver, 'span.google-symbols.NhBTye.PHazN')
        parent = span.find_element(By.XPATH, "./ancestor::div[@class='AeaXub']")
        e_place_contact = querySelector(parent, 'div.Io6YTe')
        place_contact = e_place_contact.text.strip()
    except:
        print("KContact not found!")

    print("Get Place Schedule...")
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

            schedules[day] = hours.split('–')
    except:
        print("Schedule not found!")

    print("Get images url...")
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
                EC.presence_of_element_located((By.CSS_SELECTOR, 'a.OKAoZd > div.U39Pmb'))
            )
            src = div.get_attribute('style').strip().split('"')[1]

            images.append(src)
    except:
        print("Failed to get images src!")

    driver.quit() 

    return {
        "place_name": place_name,
        "place_rate": place_rate,
        "place_address": place_address,
        "place_contact": place_contact,
        "schedules": schedules,
        "images": images
    }


from flask import Flask, request, jsonify
app = Flask(__name__)

# Sample route to return JSON data
@app.route('/scrapper', methods=['POST'])
def get_data():
    url = request.form.get('url', False)
    img = int(request.form.get('img', 3))

    if url:
        data = scrap(url, img)
    else:
        data = {
            "status" : "failed",
            "message" : "url data is required"
        }
    
    return jsonify(data)

if __name__ == '__main__':
    # app.run(port=4444, debug=True)
    url = input('Google Maps Link = ')
    img = int(input('Img Amount       = '))
    result = scrap(url, img)
    data = json.dumps(result, indent=4)
    open('result.json', 'w').write(data)