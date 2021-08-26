from http.client import FOUND
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.chrome.options import Options
import sys, time, json, urllib.request, os



# -------------- get data -------------------------
# property = json.loads(sys.argv[1]) 

#  -------------- Make Chrome Driver --------------
# options =Options()
# options.add_argument("--headless") # Runs Chrome in headless mode.
# options.add_argument('--no-sandbox') # Bypass OS security model
# options.add_argument('--disable-gpu')  # applicable to windows os only
# options.add_argument('start-maximized') # 
# options.add_argument('disable-infobars')
# options.add_argument("--disable-extensions")

# driver = webdriver.Chrome(options=options,executable_path=r"./chromedriver")
driver = webdriver.Chrome(executable_path=r"./chromedriver")
driver.get("https://www.wellingtonandreeves.com.au/wp-admin/post-new.php?post_type=property")

# login info
elem = driver.find_element_by_id("user_login")
elem.clear()
elem.send_keys("info@m4media.com.au")

elem = driver.find_element_by_id("user_pass")
elem.clear()
elem.send_keys("Jan2020!")


elem.send_keys(Keys.RETURN)
time.sleep(5)


# ---- set variables to post -----

post_title                          = "displayAddress"
REAL_HOMES_property_price             = 1000
REAL_HOMES_property_old_price         = 800
REAL_HOMES_property_price_prefix      = "$" 
REAL_HOMES_property_price_postfix     = ""
REAL_HOMES_property_size              = "903.0"
REAL_HOMES_property_size_postfix      = "sqm"
REAL_HOMES_property_lot_size          = "lot"
REAL_HOMES_property_lot_size_postfix  = "fielsss"
REAL_HOMES_property_bedrooms          = "fielsss"
REAL_HOMES_property_bathrooms         = "fielsss"
REAL_HOMES_property_garage            = "fielsss"
REAL_HOMES_property_id                = 12334
REAL_HOMES_property_year_built        = 2000

# ---------------------------------------------


elem = driver.find_element_by_id("post-title-0")
elem.send_keys(post_title)

# elem = driver.find_element_by_id("REAL_HOMES_property_price")
# elem.send_keys(REAL_HOMES_property_price)

# elem = driver.find_element_by_id("REAL_HOMES_property_old_price")
# elem.send_keys(REAL_HOMES_property_old_price)

# elem = driver.find_element_by_id("REAL_HOMES_property_price_prefix")
# elem.send_keys("$")

# elem = driver.find_element_by_id("REAL_HOMES_property_price_postfix")
# elem.send_keys(".00")

# elem = driver.find_element_by_id("REAL_HOMES_property_size")
# elem.send_keys(REAL_HOMES_property_size)

# elem = driver.find_element_by_id("REAL_HOMES_property_size_postfix")
# elem.send_keys("size_postfix")

# elem = driver.find_element_by_id("REAL_HOMES_property_lot_size")
# elem.send_keys("")

# elem = driver.find_element_by_id("REAL_HOMES_property_lot_size_postfix")
# elem.send_keys("")

# elem = driver.find_element_by_id("REAL_HOMES_property_bedrooms")
# elem.send_keys("2")

# elem = driver.find_element_by_id("REAL_HOMES_property_bathrooms")
# elem.send_keys("2")

# elem = driver.find_element_by_id("REAL_HOMES_property_garage")
# elem.send_keys("1")

# elem = driver.find_element_by_id("REAL_HOMES_property_id")
# elem.send_keys(REAL_HOMES_property_id)

# elem = driver.find_element_by_id("REAL_HOMES_property_year_built")
# elem.send_keys(REAL_HOMES_property_year_built)

# btns = driver.find_elements_by_tag_name("button")
# tb = ''
# driver.maximize_window()
# for btn in btns:
#     if "Publish" in btn.text:
#         tb = btn
#         print("SEEN 1")
        
  

# time.sleep(4)

# tb.click()

time.sleep(4)

# before publish add more data to that form..


gallery = driver.find_elements_by_class_name("rwmb-tab-gallery")
gallery[0].click()

links = driver.find_elements_by_tag_name("a")
addMediaButton = ""
for link in links:
    if "Add Media" in link.text:
        addMediaButton = link
        break

time.sleep(2)

addMediaButton.click()

# get input field
inputs = driver.find_elements_by_tag_name("input")
the_input = ""
for input in inputs:
    if "file" in input.get_attribute("type"):
        #print(input.get_attribute("id"))
        the_input = input
        break


# ----------------------------------------
# -------- download images

image_links = [
    "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/mydimport-1608453779-hires.3850-GB002-1.jpg",
    "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/mydimport-1608453927-hires.990-01.jpg",
    "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/mydimport-1608453927-hires.5603-02.jpg",
    "https://s3-ap-southeast-2.amazonaws.com/photos-clientvault-com/2326/mydimport-1608453927-hires.1458-03.jpg",
]

for index in range(len(image_links)):
    urllib.request.urlretrieve(image_links[index], "file"+str(index)+".jpg")

# ---- 
current_path = os.getcwd()
# ---- upload the downloaded pic 
for index in range(len(image_links)):
    filename = current_path + "/file" + str(index) + ".jpg"
    the_input.send_keys(filename)
    time.sleep(5)

buttons = driver.find_elements_by_tag_name("button")
uploadButton = ""
for button in buttons:
    if "Select" in button.text:
        uploadButton = button
        break

uploadButton.click()









# Publish
# driver.execute_script("for(var i=0; i<document.getElementsByTagName('button').length; i++){if(document.getElementsByTagName('button')[i].innerText=='Publish'){document.getElementsByTagName('button')[i].click();}}")

# driver.close() 
