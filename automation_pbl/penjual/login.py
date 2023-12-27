from selenium import webdriver
from selenium.webdriver.common.by import By
import time
from datetime import datetime
from link import login_url, username, password

driver = webdriver.Chrome()
driver.maximize_window()
driver.get(login_url)

username_field = driver.find_element(By.XPATH, '//input[@name="username"]')
password_field = driver.find_element(By.XPATH, '//input[@name="password"]')
login_button = driver.find_element(By.XPATH, '//input[@type="submit"]')

username_field.send_keys(username)
time.sleep(2)
password_field.send_keys(password)
time.sleep(2)
login_button.click()

time.sleep(5)

current_url = driver.current_url

if 'index.php' in current_url:
    status = "Berhasil"
elif 'login.php' in current_url:
    status = "Gagal"
else:
    status = "Failed (Unknown error)"

current_datetime = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

with open("uji-fungsionalitas.txt", "a") as file:
    waktu_uji = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
    file.write(
        f"{waktu_uji} - Fitur Login - Status: {status} \n")

# Menutup browser setelah selesai
driver.quit()
