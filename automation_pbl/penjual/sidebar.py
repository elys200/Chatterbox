from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.alert import Alert
from datetime import datetime
import time
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

try:
    game = driver.find_element(By.XPATH, '//a[@href="game/game.php"]')

    game.click()
    time.sleep(3)
    produk = driver.find_element(By.XPATH, '//a[@href="../produk/produk.php"]')

    produk.click()
    time.sleep(3)
    rekapan = driver.find_element(By.XPATH, '//a[@href="../rekapan.php"]')

    rekapan.click()
    time.sleep(3)
    beranda = driver.find_element(By.XPATH, '//a[@href="index.php"]')

    beranda.click()
    time.sleep(3)

    current_url = driver.current_url

    if 'index.php' in current_url:
        status = "Berhasil"
    elif 'rekapan.php' or "game.php" or "produk.php" in current_url:
        status = "Gagal"
    else:
        status = "Failed (Unknown error)"

except Exception as e:
    status = "Gagal"

finally:
    waktu_uji = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

    with open("uji-fungsionalitas.txt", "a") as file:
        file.write(
            f"{waktu_uji} - Fitur Sidebar - Status: {status} \n")
    driver.quit()
