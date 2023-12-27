from selenium import webdriver
from selenium.webdriver.common.by import By
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

    game_card = driver.find_element(By.XPATH, "//a[@href='detail_game.php?game=Valorant']")
    game_card.click()
    time.sleep(3)

    email_input = driver.find_element(By.XPATH, "//input[@name='email']")
    userid_input = driver.find_element(By.XPATH, "//input[@name='user_game_id']")
    nominal = driver.find_element(By.XPATH, "//select[@name='id_produk']")

    email_input.send_keys("pembeli@gmail.com")
    time.sleep(3)
    userid_input.send_keys("171184173")
    time.sleep(3)
    nominal.send_keys("739.000 Riot Cash")
    time.sleep(3)

    button_submit = driver.find_element(By.XPATH, "//button[@class='Checkout-button']")
    button_submit.click()
    time.sleep(10)

    tutup_button = driver.find_element(By.XPATH, "//a[@href='../game.php']")
    tutup_button.click()
    time.sleep(3)

    current_url = driver.current_url

    if 'game.php' in current_url:
        status = "Berhasil"
    elif 'detail_game.php' or 'transaksi.php' in current_url:
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
            f"{waktu_uji} - Fitur Pembayaran - Status: {status} \n")

    # Menutup browser setelah selesai
    driver.quit()
