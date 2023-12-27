from selenium import webdriver
from selenium.webdriver.common.by import By
import time
from datetime import datetime

registrasi_url = 'http://localhost/game_topup/game_dashboard/registration_penjual.php'
driver = webdriver.Chrome()
driver.maximize_window()
driver.get(registrasi_url)

nama_field = driver.find_element(By.XPATH, '//input[@name="name"]')
username_field = driver.find_element(By.XPATH, '//input[@name="username"]')
email_field = driver.find_element(By.XPATH, '//input[@name="email"]')
password_field = driver.find_element(By.XPATH, '//input[@name="password"]')
konfirmasi_password_field = driver.find_element(
    By.XPATH, '//input[@name="confirmpassword"]')
login_button = driver.find_element(By.XPATH, '//input[@type="submit"]')

nama_field.send_keys("penjual")
time.sleep(2)
username_field.send_keys("penjual")
time.sleep(2)
email_field.send_keys("penjual@gmail.com")
time.sleep(2)
password_field.send_keys("penjual")
time.sleep(2)
konfirmasi_password_field.send_keys("penjual")
time.sleep(2)
login_button.click()

time.sleep(5)

alert = driver.switch_to.alert
alert.accept()
time.sleep(3)

current_url = driver.current_url

if 'login.php' in current_url:
    status = "Berhasil"
elif 'registration_penjual.php' in current_url:
    status = "Gagal"
else:
    status = "Failed (Unknown error)"

current_datetime = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

with open('uji-fungsionalitas.txt', 'a') as file:
    # Menyimpan hasil uji ke dalam file txt
    with open("uji-fungsionalitas.txt", "a") as file:
        waktu_uji = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
        file.write(
            f"{waktu_uji} - Fitur Registrasi - Status: {status} \n")

    # Menutup browser setelah selesai
    driver.quit()
