from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import time


driver = webdriver.Chrome(executable_path=r"./chromedriver")
driver.get("https://www.wellingtonandreeves.com.au/wp-admin/post-new.php?post_type=property")


elem = driver.find_element_by_id("user_login")
elem.clear()
elem.send_keys("info@m4media.com.au")

elem = driver.find_element_by_id("user_pass")
elem.clear()
elem.send_keys("Jan2020!")



elem.send_keys(Keys.RETURN)
time.sleep(5)


elem = driver.find_element_by_id("post-title-0")
elem.send_keys("New Property")

elem = driver.find_element_by_id("REAL_HOMES_property_price")
elem.send_keys("1000")

elem = driver.find_element_by_id("REAL_HOMES_property_old_price")
elem.send_keys("900")

elem = driver.find_element_by_id("REAL_HOMES_property_price_prefix")
elem.send_keys("$")

elem = driver.find_element_by_id("REAL_HOMES_property_price_postfix")
elem.send_keys(".00")

elem = driver.find_element_by_id("REAL_HOMES_property_size")
elem.send_keys("1200")

elem = driver.find_element_by_id("REAL_HOMES_property_size_postfix")
elem.send_keys("postfix")

elem = driver.find_element_by_id("REAL_HOMES_property_lot_size")
elem.send_keys("123")

elem = driver.find_element_by_id("REAL_HOMES_property_lot_size_postfix")
elem.send_keys("2359")

elem = driver.find_element_by_id("REAL_HOMES_property_bedrooms")
elem.send_keys("2")

elem = driver.find_element_by_id("REAL_HOMES_property_bathrooms")
elem.send_keys("2")

elem = driver.find_element_by_id("REAL_HOMES_property_garage")
elem.send_keys("1")

elem = driver.find_element_by_id("REAL_HOMES_property_id")
elem.send_keys("9804872")

elem = driver.find_element_by_id("REAL_HOMES_property_year_built")
elem.send_keys("2019")

btns = driver.find_elements_by_tag_name("button")
tb = ''
driver.maximize_window()
for btn in btns:
    if "Publish" in btn.text:
        tb = btn
        print("SEEN 1")
        
  

time.sleep(4)

tb.click()
time.sleep(4)

driver.execute_script("for(var i=0; i<document.getElementsByTagName('button').length; i++){if(document.getElementsByTagName('button')[i].innerText=='Publish'){document.getElementsByTagName('button')[i].click();}}")

driver.close() 