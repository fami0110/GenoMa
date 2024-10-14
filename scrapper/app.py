from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

def querySelector(rel, selector):
    return rel.find_element(By.CSS_SELECTOR, selector)

def querySelectorAll(rel, selector):
    return rel.find_elements(By.CSS_SELECTOR, selector)


def scrap(url):
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
    span = querySelector(driver, 'span.google-symbols.NhBTye.PHazN')
    parent = span.find_element(By.XPATH, "./ancestor::div[@class='AeaXub']")
    e_place_contact = querySelector(parent, 'div.Io6YTe')
    place_contact = e_place_contact.text.strip()

    print("Get Place Schedule...")
    dropdown = WebDriverWait(driver, 10).until(
        EC.element_to_be_clickable((By.CSS_SELECTOR, '.OMl5r'))
    )
    dropdown.click()

    table_rows = querySelectorAll(driver, 'table.eK4R0e tr')
    schedules = {}
    for row in table_rows:
        e_day = querySelector(row, "td.ylH6lf div")
        e_hours = querySelector(row, "td.mxowUb li")
        day = e_day.text.strip()
        hours = e_hours.text.strip()

        schedules[day] = hours.split('–')

    driver.quit() 

    return {
        "place_name": place_name,
        "place_rate": place_rate,
        "place_address": place_address,
        "place_contact": place_contact,
        "schedules": schedules
    }


from flask import Flask, request, jsonify
app = Flask(__name__)

# Sample route to return JSON data
@app.route('/scrapper', methods=['POST'])
def get_data():
    url = request.form.get('url', False)

    if url:
        data = scrap(url)
    else:
        data = {
            "status" : "failed",
            "message" : "url data is required"
        }
    
    return jsonify(data)

if __name__ == '__main__':
    app.run(port=4444)