from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.alert import Alert
import time
from datetime import datetime

registrasi_url = 'http://localhost/pbl/game_topup/game_dashboard/registration.php'
driver = webdriver.Chrome()
driver.maximize_window()
driver.get(registrasi_url)

name = 'pembeli'
username = 'pembeli'
email = 'pembeli@gmail.com'
password = 'pembeli'
confirmpassword = 'pembeli'

# Wait for username field to be present
# username_field = WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.XPATH, '//input[@name="username"]')))
name_field = driver.find_element(By.XPATH, '//input[@name="name"]')
username_field = driver.find_element(By.XPATH, '//input[@name="username"]')
email_field = driver.find_element(By.XPATH, '//input[@name="email"]')
password_field = driver.find_element(By.XPATH, '//input[@name="password"]')
confirmpassword_field = driver.find_element(By.XPATH, '//input[@name="confirmpassword"]')
registrasi_button = driver.find_element(By.XPATH, '//input[@type="submit"]')
time.sleep(3)

name_field.send_keys(name)
time.sleep(3)
username_field.send_keys(username)
time.sleep(3)
email_field.send_keys(email)
time.sleep(3)
password_field.send_keys(password)
time.sleep(3)
confirmpassword_field.send_keys(confirmpassword)
time.sleep(3)

registrasi_button.click()
time.sleep(3)

# Menghadapi konfirmasi alert dan menyetujui (klik OK)
alert = Alert(driver)
time.sleep(3)
alert.accept()
time.sleep(3)

current_url = driver.current_url

if 'login.php' in current_url:
    status = "Berhasil"
elif 'registrasi.php' in current_url:
    status = "Gagal"
else:
    status = "Failed (Unknown error)"

current_datetime = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

# Menyimpan hasil uji ke dalam file txt
with open("uji-fungsionalitas.txt", "a") as file:
    waktu_uji = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
    file.write(
        f"{waktu_uji} - Fitur Registrasi - Status: {status} \n")

# Menutup browser setelah selesai
driver.quit()
