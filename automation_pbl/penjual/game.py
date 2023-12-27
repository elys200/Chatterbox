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
    tombol_game = driver.find_element(By.XPATH, "//a[@href='game/game.php']")
    tombol_game.click()
    time.sleep(3)

    # TAMBAH
    tombol_tambah = driver.find_element(
        By.XPATH, ".//a[@href='tambah_game.php']")
    tombol_tambah.click()
    time.sleep(3)

    nama_game_input = driver.find_element(By.NAME, "nama_game")
    nama_perusahaan_input = driver.find_element(By.NAME, "nama_perusahaan")
    gambar_game_input = driver.find_element(By.NAME, "gambar_game")
    gambar_detail_game_input = driver.find_element(
        By.NAME, "gambar_detail_game")
    kategori_game_input = driver.find_element(By.NAME, "kategori")
    tombol_tambah = driver.find_element(By.XPATH, "//button[text()='Tambah']")

    nama_game_input.send_keys("Mobile Legends")
    time.sleep(3)
    nama_perusahaan_input.send_keys("Moonton")
    time.sleep(3)
    gambar_game_input.send_keys("c:\ml.jpeg")
    time.sleep(3)
    gambar_detail_game_input.send_keys("c:\ml_detail.jpeg")
    time.sleep(3)
    kategori_game_input.send_keys("mobile")
    time.sleep(3)

    tombol_tambah.click()
    time.sleep(3)

    # EDIT
    tombol_ubah = driver.find_element(
        By.XPATH, "(//table[@id='tabel-game']//tr[position()=1]//a[text()='Edit'])[1]")
    tombol_ubah.click()
    time.sleep(3)

    nama_perusahaan_input = driver.find_element(By.NAME, "nama_perusahaan")
    kategori_game_input = driver.find_element(By.NAME, "kategori")
    tombol_update = driver.find_element(By.XPATH, "//button[text()='Update']")

    nama_perusahaan_input.clear()
    time.sleep(2)
    nama_perusahaan_input.send_keys("Tencent")
    time.sleep(3)

    kategori_game_input.send_keys("pc")
    time.sleep(3)

    tombol_update.click()
    time.sleep(3)

    # HAPUS
    kriteria = "Mobile Legends"

    # Temukan baris yang sesuai dengan kriteria
    baris = driver.find_element(
        By.XPATH, f"//table[@id='tabel-game']//tr[td[contains(text(), '{kriteria}')]]")

    # Klik tombol "Hapus" di baris yang sesuai
    tombol_hapus = baris.find_element(By.XPATH, ".//a[text()='Hapus']")
    tombol_hapus.click()

    # Menghadapi konfirmasi alert dan menyetujui (klik OK)
    alert = Alert(driver)
    time.sleep(3)
    alert.accept()
    time.sleep(3)

    # Memeriksa apakah elemen game masih ada di halaman (menandakan data masih ada)
    elemen_game = driver.find_elements(
        By.XPATH, f"//table[@class='table table-striped']//tr[td[contains(text(), '{kriteria}')]]")
    if not elemen_game:
        status = "Berhasil"
    else:
        status = "Gagal"

except Exception as e:
    status = "Gagal"
    print(f"Terjadi kesalahan: {e}")

finally:
    # Menyimpan hasil uji ke dalam file txt
    with open("uji-fungsionalitas.txt", "a") as file:
        waktu_uji = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
        file.write(
            f"{waktu_uji} - Fitur CRUD Game - Status: {status} \n")

    # Menutup browser setelah selesai
    driver.quit()
