from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time
from datetime import datetime

try:
    login_url = 'http://localhost/pbl/game_topup/game_dashboard/login.php'
    driver = webdriver.Chrome()
    driver.maximize_window()
    driver.get(login_url)

    username = 'pembeli'
    password = 'pembeli'

    # Wait for username field to be present
    # username_field = WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.XPATH, '//input[@name="username"]')))
    username_field = driver.find_element(By.XPATH, '//input[@name="username"]')
    password_field = driver.find_element(By.XPATH, '//input[@name="password"]')
    login_button = driver.find_element(By.XPATH, '//input[@type="submit"]')
    time.sleep(3)

    username_field.send_keys(username)
    time.sleep(3)
    password_field.send_keys(password)
    time.sleep(3)
    login_button.click()
    time.sleep(3)

    beranda_pembeli = driver.find_element(By.XPATH, "//a[@href='../pembeli/game.php']")
    beranda_pembeli.click()
    time.sleep(3)

    # Identifikasi elemen-elemen navbar
    Games_link = driver.find_element(By.XPATH, '//a[@href="#game"]')
    Games_link.click()
    time.sleep(3)

    game_card = driver.find_element(By.XPATH, "//a[@href='detail_game.php?game=Undawn']")
    game_card.click()
    time.sleep(3)

    current_url = driver.current_url

    if 'detail_game.php' in current_url:
        status = "Berhasil"
    elif 'game.php' in current_url:
        status = "Gagal"
    else:
        status = "Failed (Unknown error)"
except Exception as e:
    status = "Gagal"
    print(f"Terjadi kesalahan: {e}")

finally:
    # Menyimpan hasil uji ke dalam file txt
    with open("uji-fungsionalitas.txt", "a") as file:
        waktu_uji = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
        file.write(
            f"{waktu_uji} - Fitur Game - Status: {status} \n")

    # Menutup browser setelah selesai
    driver.quit()
